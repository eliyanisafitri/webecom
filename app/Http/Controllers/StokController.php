<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StokController extends Controller
{

    public function index()
    {
        return view('stok.list');
    }

    public function create()
    {
        return view('stok.form');
    }
    public function store(Request $r)
    {
        $fotos = [];
    if ($r->hasFile('foto')) {
        foreach ($r->file('foto') as $file) {
            $new_foto = Str::random(5) . '.' . $file->extension();
            $file->move(public_path('uploads/stok'), $new_foto);
            $fotos[] = 'uploads/stok/' . $new_foto;
        }
    }

    $x = [
        'kode' => $r->kode,
        'nama' => $r->nama,
        'idsatuan' => $r->idsatuan,
        'idkategori' => $r->idkategori,
        'saldoawal' => $r->saldoawal,
        'saldoakhir' => $r->saldoakhir,
        'hargamodal' => $r->hargamodal,
        'hargajual' => $r->hargajual,
        'foto' => json_encode($fotos),
        'desc' => $r->desc,
    ];

    DB::table('tbstok')->insertGetId($x);

    return view('stok.list');
    //     $fotoPath=$r->foto;
    //     $new_foto = Str::random(5).'.'.$fotoPath->extension();
    //     $fotoPath->move('uploads/stok/', $new_foto);
    //     $x = array(
            
    //         'kode' => $r->kode,
    //         'nama' => $r->nama,
    //         'idkategori' => $r->idkategori, 
    //         'hargajual' => $r->hargajual,
    //         'foto' => $new_foto,         
    //         'desc' => $r->desc,
    //         );

    //    \DB::table('tbstok')->insertGetId($x);

    //     return view('stok.list');
    }

    public function update(Request $r, $id)
    {

    // Mengambil data stok lama
    $stok = DB::table('tbstok')->where('id', $id)->first();
    $existingFotos = json_decode($stok->foto, true);

    // Cek apakah ada foto baru yang diunggah
    if ($r->hasFile('foto')) {
        $newFotos = [];
        foreach ($r->file('foto') as $foto) {
            $new_foto = Str::random(16) . '.' . $foto->extension();
            $foto->move('uploads/stok/', $new_foto);
            $newFotos[] = 'uploads/stok/' . $new_foto;
        }

        // Menghapus semua foto lama
        if (!empty($existingFotos)) {
            foreach ($existingFotos as $oldFoto) {
                if (file_exists($oldFoto)) {
                    unlink($oldFoto);
                }
            }
        }

        // Hanya menggunakan foto baru
        $fotos = $newFotos;
    } else {
        // Jika tidak ada foto baru, gunakan foto lama
        $fotos = $existingFotos;
    }

    // Data yang akan diupdate
    $x = array(
        'kode' => $r->kode,
        'nama' => $r->nama,
        'idsatuan' => $r->idsatuan,
        'idkategori' => $r->idkategori,
        'saldoawal' => $r->saldoawal,
        'saldoakhir' => $r->saldoakhir,
        'hargamodal' => $r->hargamodal,
        'hargajual' => $r->hargajual,
        'foto' => json_encode($fotos), // Simpan sebagai JSON
        'desc' => $r->desc,
    );

    // Melakukan update pada database
    DB::table('tbstok')->where('id', $id)->update($x);
    return view('stok.list');

}   

public function deletestok($id)
    {
        \DB::table('tbstok')
            ->where('id', $id)
            ->delete();

        return view('stok.list');
    }
}

