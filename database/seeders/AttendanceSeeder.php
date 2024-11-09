<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\User;
use App\Models\Location;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua user dan lokasi
        $users = User::all();
        $locations = Location::all();

        // Buat 100 data palsu untuk tabel attendance
        foreach (range(1, 100) as $index) {
            Attendance::create([
                'user_id' => $faker->randomElement([2, 3, 4]),
                'location_id' => $faker->randomElement($locations)->id,
                'check_in_time' => $faker->dateTimeBetween('-1 months', 'now'),
                'check_out_time' => $faker->dateTimeBetween('now', '+1 days'),
                'check_in_lat' => $faker->latitude(-90, 90),
                'check_in_long' => $faker->longitude(-180, 180),
            ]);
        }
    }
}
