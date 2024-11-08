<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $countUser = User::where('role', '!=', 'admin')->count();
        return view('dashboard.index', compact('countUser'));
    }
    public function user()
    {
        // return view('user');
        return 'halaman user';
    }
}
