<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectOffers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {   $projects = Project::with('category')->get();
        return view('project.index', [
            'projects' => $projects,
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
                    return $row->category->kategori_nama ?? '-';
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

    // project view function on landing pace 
    public function show()
    {
        $projects = Project::with('category')->get();  // Mengambil semua proyek dengan kategori
        return view('homepages.index', [
            'projects' => $projects,  // Kirim variabel 'projects' ke view
            'activeMenu' => 'project'
        ]);
    }
    public function showDetail($id)
{
    $project = Project::with('category')->findOrFail($id);
    return view('project.detail', [
        'project' => $project
    ]);
}

// Apply project functions

// Menampilkan form apply untuk project tertentu
public function apply($id)
{
    $project = Project::with('category')->findOrFail($id); // pastikan project valid dan ada

    return view('homepages.apply', [
        'project' => $project
    ]);
}

// Menyimpan data penawaran project oleh user yang login
public function applyStore(Request $request, $id)
{
    $project = Project::findOrFail($id); // pastikan ID valid, hindari apply ke project lain

    $request->validate([
        'penawaran_harga' => 'required|numeric|min:1000',
        'penawaran_deskripsi' => 'required|string|max:1000',
    ]);

    // Cek apakah user sudah pernah apply ke project ini (opsional, anti spam)
    $existingOffer = ProjectOffers::where('project_id', $project->project_id)
        ->where('user_id', Auth::id())
        ->first();

    if ($existingOffer) {
        return redirect()->route('project.apply', $id)->with('error', 'Anda sudah mengajukan penawaran untuk project ini.');
    }

    ProjectOffers::create([
        'project_id' => $project->project_id,
        'user_id' => Auth::id(),
        'penawaran_harga' => $request->penawaran_harga,
        'penawaran_deskripsi' => $request->penawaran_deskripsi,
        'Tanggal_penawaran' => now(),
    ]);

    return redirect()->route('home')->with('success', 'Penawaran berhasil diajukan!');
}

}
