<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Shipment;
use Carbon\Carbon;

class LocationCheckpointSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua shipment yang tersedia
        $shipments = Shipment::all();

        foreach ($shipments as $shipment) {
            // Misalnya tiap shipment punya 3 checkpoint
            for ($i = 0; $i < 3; $i++) {
                DB::table('location_checkpoints')->insert([
                    'shipment_id' => $shipment->id,
                    'latitude' => $faker->latitude(-90, 90),
                    'longitude' => $faker->longitude(-180, 180),
                    'location_name' => $faker->city,
                    'checkpoint_time' => Carbon::parse($shipment->shipment_date)->addHours(rand(1, 48)),
                    'notes' => $faker->optional()->sentence(),
                    'created_at' => now(),
                ]);
            }
        }
    }
}
