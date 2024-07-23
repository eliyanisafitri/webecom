<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{

    public function index()
    {
        return view('penjualan.list');
        
    }

    public function update(Request $request, $id)
    {
    
      
        //input type hiden
        $id_user = $request->id_user;

        $id_chekout = $id;

        // hapus keranjang customers

        DB::table('tbcart')->where('id_user', $id_user)->delete();

        // mengurangi stok
        $nobukti = $request->nobukti;

        $produkCustomer = DB::table('mutasi')->select('mutasi.idstok', 'mutasi.qty')->where('nobukti', $nobukti)->get();



        foreach($produkCustomer as $pc){
            $stokProduk = DB::table('tbstok')->where('id', $pc->idstok)->first();
            $stokProdukTerbaru = $stokProduk->saldoakhir - $pc->qty;

            // save data stok terbaru

            DB::table('tbstok')->where('id', $pc->idstok)->update(['saldoakhir' => $stokProdukTerbaru]);
        }


        // tbstok


        // ubah status chekout dari pending menjadi selesai

        $data =[
            'status' => 'Selesai'
        ];
    

        DB::table('tbchekout')->where('id', $id_chekout)->update($data);




        return back();
    }

}
