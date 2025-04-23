<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('homepages.index', [
            'activeMenu' => 'homepage'
        ]);
    }
    public function dashboard()
    {
        return view('dashboard.index', [
            'activeMenu' => 'dashboard'
        ]);
    }

    
}
