<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{

    public function index()
    {
        return view('about.about');
        
    }

}
