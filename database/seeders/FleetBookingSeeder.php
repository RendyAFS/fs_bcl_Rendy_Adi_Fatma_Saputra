<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\FleetBooking;
use App\Models\Location;
use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FleetBookingSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID dari tabel lain
        $customer1 = Customer::where('company_name', 'PT Maju Bersama')->first()->id;
        $customer2 = Customer::where('company_name', 'CV Sukses Makmur')->first()->id;
        $customer3 = Customer::where('company_name', 'UD Sejahtera Abadi')->first()->id;

        $truckSmall = VehicleType::where('name', 'Truk Kecil')->first()->id;
        $truckMedium = VehicleType::where('name', 'Truk Sedang')->first()->id;
        $van = VehicleType::where('name', 'Van Pengiriman')->first()->id;

        $jakartaWarehouse = Location::where('name', 'Gudang Jakarta Utara')->first()->id;
        $surabayaWarehouse = Location::where('name', 'Gudang Surabaya')->first()->id;
        $mallTamanAnggrek = Location::where('name', 'Mall Taman Anggrek')->first()->id;
        $tunjunganPlaza = Location::where('name', 'Tunjungan Plaza')->first()->id;
        $bandungDC = Location::where('name', 'Pusat Distribusi Bandung')->first()->id;

        // Booking 1 - Sudah dikonfirmasi
        FleetBooking::create([
            'booking_number' => 'BCL-BK-'.date('Ymd').'-001',
            'customer_id' => $customer1,
            'vehicle_type_id' => $truckSmall,
            'booking_date' => now()->subDays(3),
            'start_date' => now()->addDay(),
            'end_date' => now()->addDay()->addHours(8),
            'origin_location_id' => $jakartaWarehouse,
            'destination_location_id' => $mallTamanAnggrek,
            'cargo_description' => 'Barang elektronik: 20 TV LED, 15 Kulkas',
            'cargo_weight' => 3.5, // dalam ton
            'status' => 'confirmed',
            'notes' => 'Pastikan barang tiba sebelum jam 5 sore',
        ]);

        // Booking 2 - Masih pending
        FleetBooking::create([
            'booking_number' => 'BCL-BK-'.date('Ymd').'-002',
            'customer_id' => $customer2,
            'vehicle_type_id' => $truckMedium,
            'booking_date' => now()->subDay(),
            'start_date' => now()->addDays(2),
            'end_date' => now()->addDays(3),
            'origin_location_id' => $jakartaWarehouse,
            'destination_location_id' => $bandungDC,
            'cargo_description' => 'Barang fashion: 500 pakaian, 300 sepatu',
            'cargo_weight' => 8.2, // dalam ton
            'status' => 'pending',
            'notes' => 'Perlu penanganan khusus untuk pakaian formal',
        ]);

        // Booking 3 - Completed
        FleetBooking::create([
            'booking_number' => 'BCL-BK-'.date('Ymd').'-003',
            'customer_id' => $customer1,
            'vehicle_type_id' => $van,
            'booking_date' => now()->subDays(7),
            'start_date' => now()->subDays(5),
            'end_date' => now()->subDays(5)->addHours(6),
            'origin_location_id' => $jakartaWarehouse,
            'destination_location_id' => $mallTamanAnggrek,
            'cargo_description' => 'Dokumen penting dan paket kecil',
            'cargo_weight' => 0.8, // dalam ton
            'status' => 'completed',
            'notes' => 'Pengiriman express',
        ]);

        // Booking 4 - Dikonfirmasi untuk pengiriman jarak jauh
        FleetBooking::create([
            'booking_number' => 'BCL-BK-'.date('Ymd').'-004',
            'customer_id' => $customer3,
            'vehicle_type_id' => $truckMedium,
            'booking_date' => now()->subDays(2),
            'start_date' => now()->addDays(1),
            'end_date' => now()->addDays(3),
            'origin_location_id' => $jakartaWarehouse,
            'destination_location_id' => $surabayaWarehouse,
            'cargo_description' => 'Spare part mesin: 10 mesin, 50 komponen',
            'cargo_weight' => 9.5, // dalam ton
            'status' => 'confirmed',
            'notes' => 'Perlu penanganan hati-hati untuk komponen sensitif',
        ]);

        // Booking 5 - Untuk local delivery
        FleetBooking::create([
            'booking_number' => 'BCL-BK-'.date('Ymd').'-005',
            'customer_id' => $customer2,
            'vehicle_type_id' => $van,
            'booking_date' => now(),
            'start_date' => now()->addDays(1),
            'end_date' => now()->addDays(1)->addHours(4),
            'origin_location_id' => $surabayaWarehouse,
            'destination_location_id' => $tunjunganPlaza,
            'cargo_description' => 'Barang retail: pakaian musim baru',
            'cargo_weight' => 1.2, // dalam ton
            'status' => 'pending',
            'notes' => 'Pengiriman rutin mingguan',
        ]);
    }
}
