<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetBooking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_number',
        'customer_id',
        'vehicle_type_id',
        'booking_date',
        'start_date',
        'end_date',
        'origin_location_id',
        'destination_location_id',
        'cargo_description',
        'cargo_weight',
        'status',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'booking_date' => 'date',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'cargo_weight' => 'decimal:2',
    ];

    /**
     * Get the customer that owns the booking.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the vehicle type that is requested for the booking.
     */
    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    /**
     * Get the origin location for the booking.
     */
    public function originLocation()
    {
        return $this->belongsTo(Location::class, 'origin_location_id');
    }

    /**
     * Get the destination location for the booking.
     */
    public function destinationLocation()
    {
        return $this->belongsTo(Location::class, 'destination_location_id');
    }

    /**
     * Get the shipment associated with the booking.
     */
    public function shipment()
    {
        return $this->hasOne(Shipment::class, 'booking_id');
    }
}
