<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{

    public function index(){


        return view('kategori.list');
    }

    public function create(){


        return view('kategori.form');
    }
    public function store(Request $r){
        $x=array(
            'nama' => $r->nama,
        );
        \DB::table('tbkategori')->insertgetId($x);

        return view('kategori.list');
    }

    public function update(Request $r, $id){
     
        $x=array(
            'nama' => $r->nama,
        );

            \DB::table('tbkategori')
            ->where('id',$id)
            ->update($x);

            return redirect('kategori');

           
    }
    public function deletekategori($id){
        \DB::table('tbkategori')
            ->where('id', $id)
            ->delete();

        return view('kategori.list');
    }

}