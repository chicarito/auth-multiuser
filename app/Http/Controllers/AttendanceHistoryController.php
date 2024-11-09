<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceHistoryController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['user', 'location'])->get();

        foreach ($attendances as $attendance) {
            $attendance->user_name = $attendance->user->name ?? 'Tidak diketahui';
            $attendance->location_name = $attendance->location->name_location ?? 'Tidak diketahui';
            $attendance->check_in_time = $attendance->check_in_time ?? '-';
            $attendance->check_out_time = $attendance->check_out_time ?? '-';
        }


        return view('dashboard.attendance_history.index', compact('attendances'));
    }
    private function calculateDistance($lat1, $long1, $lat2, $long2)
    {
        $earthRadius = 6371; // Radius bumi dalam kilometer

        $lat1 = deg2rad($lat1);
        $long1 = deg2rad($long1);
        $lat2 = deg2rad($lat2);
        $long2 = deg2rad($long2);

        $dLat = $lat2 - $lat1;
        $dLong = $long2 - $long1;

        $a = sin($dLat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dLong / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;
        return round($distance, 2); // Hasil dalam kilometer
    }
}
