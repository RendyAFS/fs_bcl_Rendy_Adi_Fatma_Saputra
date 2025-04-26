<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Ambil user dengan role customer
        $customerUsers = User::where('role', 'customer')->get();

        Customer::create([
            'user_id' => $customerUsers[0]->id,
            'company_name' => 'PT Maju Bersama',
            'contact_person' => 'Customer One',
            'tax_id' => '01.123.456.7-001.000',
            'notes' => 'Pelanggan reguler dengan pengiriman mingguan',
        ]);

        Customer::create([
            'user_id' => $customerUsers[1]->id,
            'company_name' => 'CV Sukses Makmur',
            'contact_person' => 'Customer Two',
            'tax_id' => '02.234.567.8-002.000',
            'notes' => 'Pelanggan baru dengan pengiriman bulanan',
        ]);

        // Tambahkan customer baru dengan user baru
        $newUser = User::create([
            'name' => 'Customer Three',
            'email' => 'customer3@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '08123456796',
            'address' => 'Jl. Customer No. 3, Bandung',
        ]);

        Customer::create([
            'user_id' => $newUser->id,
            'company_name' => 'UD Sejahtera Abadi',
            'contact_person' => 'Customer Three',
            'tax_id' => '03.345.678.9-003.000',
            'notes' => 'Pelanggan dengan pengiriman khusus barang pecah belah',
        ]);
    }
}
