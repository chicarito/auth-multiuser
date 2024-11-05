<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        echo 'selamat datang di halaman admin <br>';
        echo "hello " . Auth::user()->name . '<br>';
        echo '<a href="/logout">logout</a>';
    }

    public function karyawan()
    {
        echo 'selamat datang di halaman karyawan <br>';
        echo 'Hello ' . Auth::user()->name . "<br>";
        echo '<a href="/logout">logout</a>';
    }
}
