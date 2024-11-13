<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // biarkan saja error gak ngaruh
        $attendances = Auth::user()->attendances()->latest()->limit(3)->get();
        return view('user-absensi.index', compact('attendances'));
    }

    public function riwayatAbsen()
    {
        $attendances = Attendance::with('location')
            ->where('user_id', Auth::id()) 
            ->latest() 
            ->get();

        // Menghitung jarak untuk setiap absensi
        foreach ($attendances as $attendance) {
            $attendance->distance = $attendance->calculateDistance();
        }

        // Mengirim data ke view
        return view('user-absensi.riwayatAbsen', compact('attendances'));
    }
    public function profile()
    {
        return view('user-absensi.profile');
    }
}
