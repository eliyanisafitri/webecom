<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChekoutController extends Controller
{
   public function index (){
         return view('chekout.chekout');
    }
    public function store(Request $r)
    {
        // dd(1);

        
        // Upload file
        $filePath = $r->file('fotobayar')->store('fotobayar', 'public');

         // Generate nomor bukti
        $nobukti = 'CO' . date('YmdHis');

        // Menghitung total dari keranjang untuk pengguna yang sedang login
        $total = DB::table('tbcart')
            ->join('tbstok', 'tbcart.idstok', '=', 'tbstok.id')
            ->where('tbcart.id_user', Auth::id())
            ->sum(DB::raw('tbcart.qty * tbstok.hargajual'));

        // Mengambil idstok dari keranjang, disini diasumsikan hanya satu idstok yang dipilih
        $idstok = DB::table('tbcart')
            ->where('id_user', Auth::id())
            ->value('idstok');

        // Data untuk disimpan ke database
        $data = [
            'id_user' => Auth::id(),
            'nobukti' => $nobukti, // Generate nomor bukti jika tidak disediakan
            'idstok' => $idstok, // Ganti dengan id stok yang sesuai
            'total' => $total, // Ganti dengan total yang sesuai
            'fotobayar' => $filePath,
            'nohp' => $r->nohp,
            'alamat' => $r->alamat,
            'status' => 'pending',
            'waktu' => now(),
        ];

        // Simpan ke database
        DB::table('tbchekout')->insert($data);

        // Redirect kembali ke halaman checkout dengan pesan sukses
        return redirect('cart');
    }


}
