<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index', [
            'activeMenu' => 'project'
        ]);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Project::with('category')  // Pastikan relasi 'kategori' sudah ada
                ->select(['project_id', 'judul_project', 'bujed_min', 'bujed_max', 'tanggal_posting', 'deadline', 'kategori_id']);
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori_nama', function($row){
                    return $row->kategori->kategori_nama ?? '-';
                })
                ->make(true);
        }
        return response()->json(['message' => 'Invalid request'], 400);
    }
    

    public function create()
    {
        $categories = Category::all();

        return view('project.create', [
            'activeMenu' => 'project',
            'category' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // Debug log
    
        $validated = $request->validate([
            'user_id' => 'required|exists:m_user,user_id',
            'kategori_id' => 'required|exists:m_category,kategori_id',
            'judul_project' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bujed_min' => 'required|numeric',
            'bujed_max' => 'required|numeric|gte:bujed_min',
            'tanggal_posting' => 'required|date',
            'deadline' => 'required|date|after_or_equal:tanggal_posting',
        ]);
    
        Project::create($validated);
    
        return redirect()->route('project.index')->with('success', 'Project berhasil disimpan.');
    }
    
    

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $categories = Category::all();

        return view('project.edit', [
            'project' => $project,
            'categories' => $categories,
            'activeMenu' => 'project'
        ]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'judul_project' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'bujed_min' => 'required|integer',
            'bujed_max' => 'required|integer|gte:bujed_min',
            'tanggal_posting' => 'required|date',
            'deadline' => 'required|date|after:tanggal_posting',
        ]);

        $project->update($request->all());

        return redirect()->route('project.index')->with('success', 'Project berhasil diperbarui');
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()->route('project.index')->with('error', 'Project tidak ditemukan');
        }

        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project berhasil dihapus');
    }
}
