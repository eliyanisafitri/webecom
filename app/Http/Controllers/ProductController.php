<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

     public function index(){
        return view('template.main');
    }
    public function show($id)
    {
        return view('product.detailproduct')
        ->with('id', $id);
    }

}
