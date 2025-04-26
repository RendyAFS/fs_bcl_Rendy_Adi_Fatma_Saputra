<?php

namespace Database\Seeders;

use App\Models\Fleet;
use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FleetSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID dari tipe kendaraan
        $truckSmall = VehicleType::where('name', 'Truk Kecil')->first()->id;
        $truckMedium = VehicleType::where('name', 'Truk Sedang')->first()->id;
        $truckLarge = VehicleType::where('name', 'Truk Besar')->first()->id;
        $van = VehicleType::where('name', 'Van Pengiriman')->first()->id;
        $container = VehicleType::where('name', 'Kontainer 20ft')->first()->id;

        // Buat armada Truk Kecil
        Fleet::create([
            'fleet_number' => 'BCL-TK-001',
            'vehicle_type_id' => $truckSmall,
            'license_plate' => 'B 1234 ABC',
            'model' => 'Mitsubishi Colt Diesel',
            'year_made' => 2020,
            'status' => 'available',
            'capacity' => 4.5, // dalam ton
            'last_maintenance_date' => now()->subMonths(1),
            'next_maintenance_date' => now()->addMonths(2),
        ]);

        Fleet::create([
            'fleet_number' => 'BCL-TK-002',
            'vehicle_type_id' => $truckSmall,
            'license_plate' => 'B 2345 BCD',
            'model' => 'Mitsubishi Colt Diesel',
            'year_made' => 2021,
            'status' => 'available',
            'capacity' => 4.8, // dalam ton
            'last_maintenance_date' => now()->subMonths(2),
            'next_maintenance_date' => now()->addMonths(1),
        ]);

        // Buat armada Truk Sedang
        Fleet::create([
            'fleet_number' => 'BCL-TS-001',
            'vehicle_type_id' => $truckMedium,
            'license_plate' => 'B 3456 CDE',
            'model' => 'Hino Dutro',
            'year_made' => 2019,
            'status' => 'available',
            'capacity' => 9.5, // dalam ton
            'last_maintenance_date' => now()->subWeeks(3),
            'next_maintenance_date' => now()->addMonths(3),
        ]);

        Fleet::create([
            'fleet_number' => 'BCL-TS-002',
            'vehicle_type_id' => $truckMedium,
            'license_plate' => 'B 4567 DEF',
            'model' => 'Hino Dutro',
            'year_made' => 2020,
            'status' => 'maintenance',
            'capacity' => 9.8, // dalam ton
            'last_maintenance_date' => now(),
            'next_maintenance_date' => now()->addMonths(3),
        ]);

        // Buat armada Truk Besar
        Fleet::create([
            'fleet_number' => 'BCL-TB-001',
            'vehicle_type_id' => $truckLarge,
            'license_plate' => 'B 5678 EFG',
            'model' => 'Hino Ranger',
            'year_made' => 2018,
            'status' => 'available',
            'capacity' => 18.5, // dalam ton
            'last_maintenance_date' => now()->subMonths(1)->subWeeks(2),
            'next_maintenance_date' => now()->addWeeks(2),
        ]);

        // Buat armada Van Pengiriman
        Fleet::create([
            'fleet_number' => 'BCL-VP-001',
            'vehicle_type_id' => $van,
            'license_plate' => 'B 6789 FGH',
            'model' => 'Daihatsu Gran Max',
            'year_made' => 2022,
            'status' => 'available',
            'capacity' => 1.8, // dalam ton
            'last_maintenance_date' => now()->subWeeks(1),
            'next_maintenance_date' => now()->addMonths(3),
        ]);

        Fleet::create([
            'fleet_number' => 'BCL-VP-002',
            'vehicle_type_id' => $van,
            'license_plate' => 'B 7890 GHI',
            'model' => 'Daihatsu Gran Max',
            'year_made' => 2022,
            'status' => 'unavailable', // sedang digunakan
            'capacity' => 1.8, // dalam ton
            'last_maintenance_date' => now()->subWeeks(2),
            'next_maintenance_date' => now()->addMonths(3)->subWeeks(1),
        ]);

        // Buat armada Kontainer
        Fleet::create([
            'fleet_number' => 'BCL-KC-001',
            'vehicle_type_id' => $container,
            'license_plate' => 'B 8901 HIJ',
            'model' => 'Mercedes-Benz Actros',
            'year_made' => 2017,
            'status' => 'available',
            'capacity' => 24.0, // dalam ton
            'last_maintenance_date' => now()->subMonths(3),
            'next_maintenance_date' => now()->addWeeks(1),
        ]);
    }
}
