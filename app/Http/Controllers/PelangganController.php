<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{

    public function index(){


        return view('pelanggan.list');
    }

    public function create(){


        return view('pelanggan.form');
    }
    public function store(Request $r){
        $x=array(
            'kode' => $r->kode,
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'hp' => $r->hp,
            'top' => $r->top,
        );
        \DB::table('tbpelanggan')->insertgetId($x);

        return view('pelanggan.list');
    }

    public function update(Request $r, $id){
     
        $x=array(
            'kode' => $r->kode,
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'hp' => $r->hp,
            'top' => $r->top,
        );

            \DB::table('tbpelanggan')
            ->where('id',$id)
            ->update($x);

            return redirect('pelanggan');

           
    }
    public function deletepelanggan($id){
        \DB::table('tbpelanggan')
            ->where('id', $id)
            ->delete();

        return view('pelanggan.list');
    }

}