<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'username' => 'admin123',
            'password' => bcrypt(123),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'karyawan',
            'username' => 'karyawan123',
            'password' => bcrypt(123),
            'role' => 'user',
            'jabatan' => 'karyawan',
        ]);
    }
}
