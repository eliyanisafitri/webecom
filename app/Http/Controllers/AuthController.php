<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required|min:10|max:15',
            'address' => 'required|max:255',
        ]);

        $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->save();
       

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Coba melakukan otentikasi
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
             return redirect('/cart')->with('success', 'Login berhasil');
        }

        // Otentikasi gagal
        return redirect()->route('login')->with('error', 'Email atau password salah');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}