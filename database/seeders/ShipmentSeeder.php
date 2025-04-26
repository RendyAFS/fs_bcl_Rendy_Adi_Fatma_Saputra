<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Fleet;
use App\Models\FleetBooking;
use App\Models\Shipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    public function run()
    {
        // Ambil booking yang sudah confirmed
        $confirmedBookings = FleetBooking::whereIn('status', ['confirmed', 'completed'])->get();

        // Ambil ID dari tabel lain
        $fleetSmall = Fleet::where('fleet_number', 'BCL-TK-001')->first()->id;
        $fleetVan = Fleet::where('fleet_number', 'BCL-VP-002')->first()->id;
        $fleetMedium = Fleet::where('fleet_number', 'BCL-TS-001')->first()->id;

        $driver1 = Driver::where('license_number', 'SIM-A-123456789')->first()->id;
        $driver2 = Driver::where('license_number', 'SIM-A-987654321')->first()->id;
        $driver3 = Driver::where('license_number', 'SIM-B1-123456789')->first()->id;

        // Shipment untuk booking 1 (dalam perjalanan/in_transit)
        Shipment::create([
            'shipment_number' => 'BCL-SH-'.date('Ymd').'-001',
            'booking_id' => $confirmedBookings[0]->id,
            'fleet_id' => $fleetSmall,
            'driver_id' => $driver1,
            'shipment_date' => now(),
            'estimated_arrival' => now()->addHours(4),
            'actual_arrival' => null, // belum sampai
            'origin_location_id' => $confirmedBookings[0]->origin_location_id,
            'destination_location_id' => $confirmedBookings[0]->destination_location_id,
            'status' => 'in_transit',
            'notes' => 'Sedang dalam perjalanan menuju lokasi',
        ]);

        // Shipment untuk booking 3 (sudah selesai/delivered)
        Shipment::create([
            'shipment_number' => 'BCL-SH-'.date('Ymd').'-002',
            'booking_id' => $confirmedBookings[1]->id,
            'fleet_id' => $fleetVan,
            'driver_id' => $driver2,
            'shipment_date' => now()->subDays(5),
            'estimated_arrival' => now()->subDays(5)->addHours(3),
            'actual_arrival' => now()->subDays(5)->addHours(2)->addMinutes(45), // sampai lebih cepat
            'origin_location_id' => $confirmedBookings[1]->origin_location_id,
            'destination_location_id' => $confirmedBookings[1]->destination_location_id,
            'status' => 'delivered',
            'notes' => 'Pengiriman selesai lebih cepat dari jadwal',
        ]);

        // Shipment untuk booking 4 (belum berangkat/pending)
        Shipment::create([
            'shipment_number' => 'BCL-SH-'.date('Ymd').'-003',
            'booking_id' => $confirmedBookings[2]->id,
            'fleet_id' => $fleetMedium,
            'driver_id' => $driver3,
            'shipment_date' => now()->addDay(),
            'estimated_arrival' => now()->addDays(3),
            'actual_arrival' => null, // belum sampai
            'origin_location_id' => $confirmedBookings[2]->origin_location_id,
            'destination_location_id' => $confirmedBookings[2]->destination_location_id,
            'status' => 'pending',
            'notes' => 'Persiapan untuk pengiriman jarak jauh',
        ]);
    }
}
