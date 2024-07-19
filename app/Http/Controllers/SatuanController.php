<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{

    public function index(){


        return view('satuan.list');
    }

    public function create(){


        return view('satuan.form');
    }
    public function store(Request $r){
        $x=array(
            'nama' => $r->nama,
        );
        \DB::table('tbsatuan')->insertgetId($x);

        return view('satuan.list');
    }

    public function update(Request $r, $id){
     
        $x=array(
            'nama' => $r->nama,
        );

            \DB::table('tbsatuan')
            ->where('id',$id)
            ->update($x);

            return redirect('satuan');

           
    }
    public function deletesatuan($id){
        \DB::table('tbsatuan')
            ->where('id', $id)
            ->delete();

        return view('satuan.list');
    }

}