<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function view(){
        return view('homepages.jobview',[

        ]);
    }

}
