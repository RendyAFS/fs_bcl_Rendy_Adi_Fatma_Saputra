<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    public function run()
    {
        VehicleType::create([
            'name' => 'Truk Kecil',
            'description' => 'Truk dengan kapasitas kecil, cocok untuk pengiriman dalam kota',
            'max_capacity' => 5.0, // dalam ton
        ]);

        VehicleType::create([
            'name' => 'Truk Sedang',
            'description' => 'Truk dengan kapasitas menengah, cocok untuk pengiriman antar kota',
            'max_capacity' => 10.0, // dalam ton
        ]);

        VehicleType::create([
            'name' => 'Truk Besar',
            'description' => 'Truk dengan kapasitas besar, cocok untuk pengiriman antar provinsi',
            'max_capacity' => 20.0, // dalam ton
        ]);

        VehicleType::create([
            'name' => 'Van Pengiriman',
            'description' => 'Van dengan kapasitas kecil, cocok untuk pengiriman cepat dalam kota',
            'max_capacity' => 2.0, // dalam ton
        ]);

        VehicleType::create([
            'name' => 'Kontainer 20ft',
            'description' => 'Kontainer standar 20 kaki, cocok untuk pengiriman internasional',
            'max_capacity' => 25.0, // dalam ton
        ]);
    }
}
