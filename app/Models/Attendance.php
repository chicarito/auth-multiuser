<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function calculateDistance()
    {
        $location = Location::find($this->location_id);

        if (!$location || !$this->check_in_lat || !$this->check_in_long) {
            return null;
        }

        // Koordinat lokasi check-in user
        $lat1 = $this->check_in_lat;
        $lon1 = $this->check_in_long;

        // Koordinat lokasi kantor
        $lat2 = $location->latitude;
        $lon2 = $location->longitude;

        // Rumus Haversine
        $earthRadius = 6371; // Radius bumi dalam kilometer
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;

        return round($distance, 2); // Jarak dalam kilometer (dibulatkan 2 desimal)
    }
    public function calculateCheckOutDistance()
    {
        $location = Location::find($this->location_id);

        if (!$location || !$this->check_out_lat || !$this->check_out_long) {
            return null;
        }

        // Koordinat lokasi check-out user
        $lat1 = $this->check_out_lat;
        $lon1 = $this->check_out_long;

        // Koordinat lokasi kantor
        $lat2 = $location->latitude;
        $lon2 = $location->longitude;

        // Rumus Haversine
        $earthRadius = 6371; // Radius bumi dalam kilometer
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;

        return round($distance, 2); // Jarak dalam kilometer (dibulatkan 2 desimal)
    }
}
