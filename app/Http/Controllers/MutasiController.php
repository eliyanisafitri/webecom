<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MutasiController extends Controller
{

    public function index(){


        return view('mutasi.list');
    }

    public function create(){


        return view('mutasi.form');
    }
    public function store(Request $r){
        $x=array(
            'nobukti' => $r->nobukti,
            'mk' => $r->mk,
            'idstok' => $r->idstok,
            'qty' => $r->qty,
            'harga' => $r->harga,
            'ket' => $r->ket,
        );
        \DB::table('mutasi')->insertgetId($x);

        return view('mutasi.list');
    }

    public function update(Request $r, $id){
     
        $x=array(
            'nobukti' => $r->nobukti,
            'mk' => $r->mk,
            'idstok' => $r->idstok,
            'qty' => $r->qty,
            'ket' => $r->ket,
        );

            \DB::table('mutasi')
            ->where('id',$id)
            ->update($x);

            return redirect('mutasi');

           
    }
    public function deletemutasi($id){
        \DB::table('mutasi')
            ->where('id', $id)
            ->delete();

        return view('mutasi.list');
    }

}