<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JualController extends Controller
{

    public function index()
    {
        return view('jual.list');
    }

    public function create()
    {
        return view('jual.form');
    }
    public function store(Request $r)
    {
        $x = array(
            'nobukti' => $r->nobukti,
            'idpelanggan' => $r->idpelanggan, 
            'tgl' => $r->tgl, 
            'ket' => $r->ket,
            );

       \DB::table('jual')->insertGetId($x);

        return view('jual.list');
    }

    public function update(Request $r, $id)
    {
        $x = array(
            'nobukti' => $r->nobukti,
            'idpelanggan' => $r->idpelanggan, 
            'tgl' => $r->tgl, 
            'ket' => $r->ket,
    );

    \DB::table('jual')
        ->where('id', $id)
        ->update($x);

    return view('jual.list');
}   

public function deletejual($id)
    {
        \DB::table('jual')
            ->where('id', $id)
            ->delete();

        return view('jual.list');
    }
}
