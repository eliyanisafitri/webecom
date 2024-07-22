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

        DB::table('tbcart')->where('id_user', $id_user)->delete();

        $data =[
            'status' => 'Selesai'
        ];

        DB::table('tbchekout')->where('id', $id_chekout)->update($data);
        return back();
    }

}
