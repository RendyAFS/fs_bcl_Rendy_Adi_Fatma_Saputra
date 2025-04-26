<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        // Gudang/Warehouse
        Location::create([
            'name' => 'Gudang Jakarta Utara',
            'address' => 'Jl. Gudang Utama No. 123',
            'city' => 'Jakarta Utara',
            'province' => 'DKI Jakarta',
            'postal_code' => '14240',
            'country' => 'Indonesia',
            'latitude' => -6.1544,
            'longitude' => 106.8915,
        ]);

        Location::create([
            'name' => 'Gudang Surabaya',
            'address' => 'Jl. Raya Kenjeran No. 456',
            'city' => 'Surabaya',
            'province' => 'Jawa Timur',
            'postal_code' => '60134',
            'country' => 'Indonesia',
            'latitude' => -7.2575,
            'longitude' => 112.7521,
        ]);

        // Pusat Distribusi/Distribution Centers
        Location::create([
            'name' => 'Pusat Distribusi Bandung',
            'address' => 'Jl. Soekarno Hatta No. 789',
            'city' => 'Bandung',
            'province' => 'Jawa Barat',
            'postal_code' => '40214',
            'country' => 'Indonesia',
            'latitude' => -6.9175,
            'longitude' => 107.6191,
        ]);

        Location::create([
            'name' => 'Pusat Distribusi Semarang',
            'address' => 'Jl. Majapahit No. 101',
            'city' => 'Semarang',
            'province' => 'Jawa Tengah',
            'postal_code' => '50167',
            'country' => 'Indonesia',
            'latitude' => -7.0051,
            'longitude' => 110.4381,
        ]);

        // Lokasi Pelanggan/Customer Locations
        Location::create([
            'name' => 'Mall Taman Anggrek',
            'address' => 'Jl. Letjen S. Parman Kav. 21',
            'city' => 'Jakarta Barat',
            'province' => 'DKI Jakarta',
            'postal_code' => '11470',
            'country' => 'Indonesia',
            'latitude' => -6.1781,
            'longitude' => 106.7932,
        ]);

        Location::create([
            'name' => 'Tunjungan Plaza',
            'address' => 'Jl. Basuki Rahmat No. 8-12',
            'city' => 'Surabaya',
            'province' => 'Jawa Timur',
            'postal_code' => '60261',
            'country' => 'Indonesia',
            'latitude' => -7.2620,
            'longitude' => 112.7382,
        ]);

        // Pelabuhan/Ports
        Location::create([
            'name' => 'Pelabuhan Tanjung Priok',
            'address' => 'Jl. Raya Pelabuhan',
            'city' => 'Jakarta Utara',
            'province' => 'DKI Jakarta',
            'postal_code' => '14310',
            'country' => 'Indonesia',
            'latitude' => -6.1092,
            'longitude' => 106.8861,
        ]);

        Location::create([
            'name' => 'Pelabuhan Tanjung Perak',
            'address' => 'Jl. Tanjung Perak Timur',
            'city' => 'Surabaya',
            'province' => 'Jawa Timur',
            'postal_code' => '60177',
            'country' => 'Indonesia',
            'latitude' => -7.2022,
            'longitude' => 112.7312,
        ]);
    }
}
