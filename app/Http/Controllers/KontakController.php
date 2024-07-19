<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{

    public function index()
    {
        return view('kontak.list');
    }

    public function create()
    {
        return view('kontak.form');
    }
    public function store(Request $r)
    {
        $x = array(
            'idpelanggan' => $r->idpelanggan,
            'namakontak' => $r->namakontak,
            'hp' => $r->hp,
        );
        \DB::table('tbkontak')->insertgetId($x);

        return view('kontak.list');
    }

    public function update(Request $r, $id)
    {

        $x = array(
            'idpelanggan' => $r->idpelanggan,
            'namakontak' => $r->namakontak,
            'hp' => $r->hp,
        );

        \DB::table('tbkontak')
            ->where('id', $id)
            ->update($x);

        return view('kontak.list')
            ->with('judul', 'Daftar dosen');
    }
    public function deletekontak($id)
    {
        \DB::table('tbkontak')
            ->where('id', $id)
            ->delete();

        return view('kontak.list');
    }
}
