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

    // Menyimpan data pembelian ke tabel 'beli'
    \DB::table('beli')->insertGetId($x);

    // Menambah stok barang di tabel 'tbstok'
    $stokBarang = DB::table('tbstok')->where('id', $r->idstok)->first();
    $stokBaru = $stokBarang->saldoakhir + $r->qty;
    DB::table('tbstok')->where('id', $r->idstok)->update(['saldoakhir' => $stokBaru]);

    // Menyimpan data mutasi ke tabel 'mutasi'
    $mutasi = array(
        'nobukti' => $nobukti,
        'idstok' => $r->idstok,
        'qty' => $r->qty,
        'harga' => $r->harga, 
        // 'tgl' => $r->tgl,
        // 'jenis' => 'Pembelian', // Menandai jenis mutasi
    );
    DB::table('mutasi')->insert($mutasi);

    return redirect('beli');

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
