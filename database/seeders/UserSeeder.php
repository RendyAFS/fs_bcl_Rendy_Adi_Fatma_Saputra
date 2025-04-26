<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        User::create([
            'name' => 'Admin BCL-Tracker',
            'email' => 'admin@bcl-tracker.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '08123456789',
            'address' => 'Jl. Admin No. 1, Jakarta',
        ]);

        // Staff users
        User::create([
            'name' => 'Staff One',
            'email' => 'staff1@bcl-tracker.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '08123456790',
            'address' => 'Jl. Staff No. 1, Jakarta',
        ]);

        User::create([
            'name' => 'Staff Two',
            'email' => 'staff2@bcl-tracker.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '08123456791',
            'address' => 'Jl. Staff No. 2, Jakarta',
        ]);

        // Customer users (will be linked to customers table)
        User::create([
            'name' => 'Customer One',
            'email' => 'customer1@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '08123456792',
            'address' => 'Jl. Customer No. 1, Jakarta',
        ]);

        User::create([
            'name' => 'Customer Two',
            'email' => 'customer2@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '08123456793',
            'address' => 'Jl. Customer No. 2, Jakarta',
        ]);

        // Driver users (will be linked to drivers table)
        User::create([
            'name' => 'Driver One',
            'email' => 'driver1@bcl-tracker.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '08123456794',
            'address' => 'Jl. Driver No. 1, Jakarta',
        ]);

        User::create([
            'name' => 'Driver Two',
            'email' => 'driver2@bcl-tracker.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '08123456795',
            'address' => 'Jl. Driver No. 2, Jakarta',
        ]);
    }
}
