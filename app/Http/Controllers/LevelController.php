<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index()
    {
        return view('level.index', [
            'activeMenu' => 'level'
        ]);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Level::select(['level_id', 'level_kode', 'level_nama']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return response()->json(['message' => 'Invalid request'], 400);
    }

    public function create()
    {
        return view('level.create', [
            'activeMenu' => 'level'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|string|max:20|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:50|unique:m_level,level_nama'
        ]);

        Level::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect()->route('level.index')->with('success', 'Level berhasil ditambahkan');
    }

    public function edit($id)
    {
        $level = Level::findOrFail($id);

        return view('level.edit', [
            'level' => $level,
            'activeMenu' => 'level'
        ]);
    }

    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);

        $request->validate([
            'level_kode' => 'required|string|max:20|unique:m_level,level_kode,' . $id . ',level_id',
            'level_nama' => 'required|string|max:50|unique:m_level,level_nama,' . $id . ',level_id'
        ]);

        $level->level_kode = $request->level_kode;
        $level->level_nama = $request->level_nama;
        $level->save();

        return redirect()->route('level.index')->with('success', 'Level berhasil diperbarui');
    }

    public function destroy($id)
    {
        $level = Level::find($id);

        if (!$level) {
            return redirect()->route('level.index')->with('error', 'Level tidak ditemukan');
        }

        $level->delete();

        return redirect()->route('level.index')->with('success', 'Level berhasil dihapus');
    }
}
