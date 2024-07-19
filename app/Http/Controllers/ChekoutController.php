<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChekoutController extends Controller
{
   public function index (){
         return view('chekout.chekout');
    }
    public function store(Request $r){
        $x=array(
            'nobukti' => $r->nobukti,
            'idpelanggan' => $r->idpelanggan,
            'idstok' => $r->idstok,
            'total' => $r->total,
            'fotobayar' => $r->fotobayar,
            'waktu' => $r->waktu,
      
        );
        \DB::table('tbchekout')->insertgetId($x);

        return view('chekout.chekout');
    }

}
