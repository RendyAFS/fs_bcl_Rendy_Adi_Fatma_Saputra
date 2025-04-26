<?php

namespace Database\Seeders;

use App\Models\Shipment;
use App\Models\ShipmentItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentItemSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua shipment dari database
        $shipments = Shipment::all();

        // Buat item untuk shipment pertama (in_transit)
        if ($shipments->count() > 0) {
            ShipmentItem::create([
                'shipment_id' => $shipments[0]->id,
                'item_name' => 'Paket Elektronik',
                'quantity' => 3,
                'weight' => 15.75,
                'volume' => 0.5,
                'notes' => 'Barang elektronik, harap hati-hati',
            ]);

            ShipmentItem::create([
                'shipment_id' => $shipments[0]->id,
                'item_name' => 'Dokumen Penting',
                'quantity' => 1,
                'weight' => 2.0,
                'volume' => 0.01,
                'notes' => 'Dokumen rahasia, jangan dibuka',
            ]);
        }

        // Buat item untuk shipment kedua (delivered)
        if ($shipments->count() > 1) {
            ShipmentItem::create([
                'shipment_id' => $shipments[1]->id,
                'item_name' => 'Paket Makanan',
                'quantity' => 10,
                'weight' => 25.0,
                'volume' => 0.8,
                'notes' => 'Makanan kering, tidak mudah rusak',
            ]);

            ShipmentItem::create([
                'shipment_id' => $shipments[1]->id,
                'item_name' => 'Alat Medis',
                'quantity' => 5,
                'weight' => 12.5,
                'volume' => 0.3,
                'notes' => 'Alat medis steril, jangan dibuka',
            ]);
        }

        // Buat item untuk shipment ketiga (pending)
        if ($shipments->count() > 2) {
            ShipmentItem::create([
                'shipment_id' => $shipments[2]->id,
                'item_name' => 'Bahan Bangunan',
                'quantity' => 50,
                'weight' => 250.0,
                'volume' => 3.5,
                'notes' => 'Material konstruksi, berat',
            ]);

            ShipmentItem::create([
                'shipment_id' => $shipments[2]->id,
                'item_name' => 'Perabotan Rumah',
                'quantity' => 8,
                'weight' => 75.0,
                'volume' => 4.2,
                'notes' => 'Perabotan rumah tangga, perlu penanganan khusus',
            ]);

            ShipmentItem::create([
                'shipment_id' => $shipments[2]->id,
                'item_name' => 'Perlengkapan Kantor',
                'quantity' => 15,
                'weight' => 45.0,
                'volume' => 1.8,
                'notes' => 'Barang kantor mudah rusak',
            ]);
        }
    }
}
