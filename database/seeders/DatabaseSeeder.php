<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            VehicleTypeSeeder::class,
            LocationSeeder::class,
            CustomerSeeder::class,
            FleetSeeder::class,
            DriverSeeder::class,
            FleetBookingSeeder::class,
            ShipmentSeeder::class,
            ShipmentItemSeeder::class,
            LocationCheckpointSeeder::class,
            MaintenanceRecordSeeder::class,
        ]);
    }
}
