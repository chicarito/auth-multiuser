<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceHistory extends Controller
{
    public function attendanceHistory()
    {
        // Mengambil semua riwayat absensi
        $attendances = Attendance::with('user', 'location')->orderBy('check_in_time', 'desc')->get();

        // Menghitung jarak setiap absensi
        foreach ($attendances as $attendance) {
            $attendance->distance = $attendance->calculateDistance();
            $attendance->check_out_distance = $attendance->calculateCheckOutDistance();
        }

        return view('dashboard.attendance-history.attendanceHistory', compact('attendances'));
    }
}
