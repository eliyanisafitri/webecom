<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthAdminController extends Controller
{
   public function index()
    {
        return view('admin.login');
        
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
        'email' => ['required'],
        'password' => ['required'],
        ]);

        $users = DB::table('users')
        ->where('email', $request->email)
        ->where('role', 'admin')->first();

        if($users){
            if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('welcome');
        }

        } else{
            return back()->with('eror', 'username atau password salah');
        }
    }

    public function register(){
        return view('admin.register');
    }

    public function registerStore(Request $request ){

        if ($request->password){
         DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt ($request->password),
        'role' => 'admin',
            ]);

            return redirect('/auth/admin');
        } else{
            return back();
        }
    }

     public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/admin');
    }
}
