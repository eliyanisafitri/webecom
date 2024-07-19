<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemasokController extends Controller
{

    public function index(){


        return view('pemasok.list');
    }

    public function create(){


        return view('pemasok.form');
    }
    public function store(Request $r){
        $x=array(
            'kode' => $r->kode,
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'hp' => $r->hp,
            'top' => $r->top,
        );
        \DB::table('tbpemasok')->insertgetId($x);

        return view('pemasok.list');
    }

    public function update(Request $r, $id){
     
        $x=array(
            'kode' => $r->kode,
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'hp' => $r->hp,
            'top' => $r->top,
        );

            \DB::table('tbpemasok')
            ->where('id',$id)
            ->update($x);

            return redirect('pemasok');

           
    }
    public function deletepemasok($id){
        \DB::table('tbpemasok')
            ->where('id', $id)
            ->delete();

        return view('pemasok.list');
    }

}