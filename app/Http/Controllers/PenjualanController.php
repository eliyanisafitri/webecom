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
      $x = array (
         'status' => $request->status,
      );
      DB::table('tbchekout')->where('id', $id)->update($x);
        return view('penjualan.list');
        
    }

}
