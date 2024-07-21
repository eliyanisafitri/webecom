<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BeliController extends Controller
{

    public function index()
    {
        return view('beli.list');
    }

    public function create()
    {
        return view('beli.form');
    }
    public function store(Request $r)
    
    {
        $nobukti = 'BL-' . date('YmdHis');
        $x = array(
            'nobukti' => $nobukti,
            'idpemasok' => $r->idpemasok, 
            'tgl' => $r->tgl, 
            'idstok' => $r->idstok, 
            'harga' => $r->harga, 
            'qty' => $r->qty, 
            'total' => $r->total, 
            
            );

       \DB::table('beli')->insertGetId($x);

        return view('beli.list');
    }

    public function update(Request $r, $id)
    {
        $x = array(
            'nobukti' => $r->nobukti,
            'idpemasok' => $r->idpemasok, 
            'tgl' => $r->tgl, 
            'nama' => $r->nama, 
            'harga' => $r->harga, 
            'qty' => $r->qty, 
            'total' => $r->total, 
    );

    \DB::table('beli')
        ->where('id', $id)
        ->update($x);

    return view('beli.list');
}   

public function deletebeli($id)
    {
        \DB::table('beli')
            ->where('id', $id)
            ->delete();

        return view('beli.list');
    }
}
