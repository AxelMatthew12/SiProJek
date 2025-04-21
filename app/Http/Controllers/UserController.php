<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
{
    return view('user.index', [
        'activeMenu' => 'user'
    ]);
}

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('level')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('level', function($row){
                    return $row->level ? $row->level->level_nama : '-';
                })
                ->make(true);
        }
    }
}
