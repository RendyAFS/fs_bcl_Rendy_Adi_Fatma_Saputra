<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('shipment_number', 50)->unique();
            $table->foreignId('booking_id')->constrained('fleet_bookings');
            $table->foreignId('fleet_id')->constrained('fleets');
            $table->foreignId('driver_id')->constrained('drivers');
            $table->dateTime('shipment_date');
            $table->dateTime('estimated_arrival');
            $table->dateTime('actual_arrival')->nullable();
            $table->foreignId('origin_location_id')->constrained('locations');
            $table->foreignId('destination_location_id')->constrained('locations');
            $table->enum('status', ['pending', 'in_transit', 'arrived', 'delivered', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
