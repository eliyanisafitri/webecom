<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        return view('cart.cart');
    }

    public function store(Request $request)
    {

      

        $idstok = $request->idstok;
        $qty = $request->qty;

    
        $id_users = auth()->user()->id;


        // Cek apakah produk sudah ada di keranjang
        $cartItem = \DB::table('tbcart')
            ->where('idstok', $idstok)
            ->where('id_user',$id_users)
            ->first();


        if ($cartItem) {
            // Produk sudah ada di keranjang, tambahkan quantity
            \DB::table('tbcart')
                ->where('idstok', $idstok)
                ->increment('qty', $qty);
        } else {
            // Produk belum ada di keranjang, tambahkan produk baru
            \DB::table('tbcart')->insert([
                'idstok' => $idstok,
                'qty' => $qty,
                'id_user' => auth()->user()->id
                
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        \DB::table('tbcart')
            ->where('id', $id)
            ->update(['qty' => $request->qty]);

        return redirect()->route('cart.index');
    }

     public function destroy($id)
    {
        \DB::table('tbcart')
            ->where('id', $id)
            ->delete();

        return redirect()->route('cart.index');
    }

}

