<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'activeMenu' => 'category'
        ]);
    }
    // menampilkan isi data tabel
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select(['kategori_kode', 'kategori_nama']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return response()->json(['message' => 'Invalid request'], 400);
    }

}
