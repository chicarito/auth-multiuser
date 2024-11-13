<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'user') {
                // return redirect('/karyawan');
                return redirect('/index')->with('status', 'selamat datang ' . Auth::user()->name);
            }
        }
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
