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
        Schema::create('fleets', function (Blueprint $table) {
            $table->id();
            $table->string('fleet_number', 50)->unique();
            $table->foreignId('vehicle_type_id')->constrained('vehicle_types');
            $table->string('license_plate', 20)->unique();
            $table->string('model', 100);
            $table->year('year_made');
            $table->enum('status', ['available', 'unavailable', 'maintenance'])->default('available');
            $table->decimal('capacity', 10, 2)->comment('dalam ton');
            $table->date('last_maintenance_date')->nullable();
            $table->date('next_maintenance_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleets');
    }
};
