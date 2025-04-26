<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    public function run()
    {
        // Ambil user driver yang sudah dibuat di UserSeeder
        $driverUsers = User::where('email', 'like', 'driver%@bcl-tracker.com')->get();

        Driver::create([
            'user_id' => $driverUsers[0]->id,
            'license_number' => 'SIM-A-123456789',
            'license_type' => 'SIM A',
            'license_expiry' => now()->addYears(2),
            'status' => 'available',
        ]);

        Driver::create([
            'user_id' => $driverUsers[1]->id,
            'license_number' => 'SIM-A-987654321',
            'license_type' => 'SIM A',
            'license_expiry' => now()->addYears(1)->addMonths(6),
            'status' => 'available',
        ]);

        // Tambahkan driver baru
        $newDriverUser = User::create([
            'name' => 'Driver Three',
            'email' => 'driver3@bcl-tracker.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '08123456797',
            'address' => 'Jl. Driver No. 3, Jakarta',
        ]);

        Driver::create([
            'user_id' => $newDriverUser->id,
            'license_number' => 'SIM-B1-123456789',
            'license_type' => 'SIM B1',
            'license_expiry' => now()->addYears(3),
            'status' => 'on_duty', // sedang bertugas
        ]);

        // Tambahkan driver untuk truk besar
        $newDriverUser2 = User::create([
            'name' => 'Driver Four',
            'email' => 'driver4@bcl-tracker.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '08123456798',
            'address' => 'Jl. Driver No. 4, Jakarta',
        ]);

        Driver::create([
            'user_id' => $newDriverUser2->id,
            'license_number' => 'SIM-B2-123456789',
            'license_type' => 'SIM B2',
            'license_expiry' => now()->addYears(2)->addMonths(8),
            'status' => 'available',
        ]);
    }
}
