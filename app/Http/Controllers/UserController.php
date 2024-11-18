<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Location;
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

    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'type' => 'required|in:check_in,check_out'
        ]);

        $user_id = Auth::id();
        $today = now()->toDateString();

        $location = Location::where('is_active', true)->first();
        if (!$location) {
            return back()->with('status', 'Tidak ada lokasi instansi yang aktif');
        }

        $attendance = Attendance::where('user_id', $user_id)->whereDate('created_at', $today)->first();

        if (!$attendance) {
            $attendance = new Attendance();
            $attendance->user_id = $user_id;
            $attendance->location_id = $location->id; // Perbaiki bagian ini
            $attendance->check_in_lat = $request->latitude;
            $attendance->check_in_long = $request->longitude;
            $attendance->check_in_time = now();
            $attendance->save();
            return back()->with('status', 'Absen Masuk Berhasil');
        } else {
            if (!$attendance->check_out_time) {
                $attendance->check_out_lat = $request->latitude;
                $attendance->check_out_long = $request->longitude;
                $attendance->check_out_time = now();
                $attendance->save();
                return back()->with('status', 'Absen Pulang Berhasil');
            } else {
                return back()->with('status', 'Anda sudah absen hari ini');
            }
        }
    }
}
