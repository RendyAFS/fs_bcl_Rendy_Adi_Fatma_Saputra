<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'shipment_number',
        'booking_id',
        'fleet_id',
        'driver_id',
        'shipment_date',
        'estimated_arrival',
        'actual_arrival',
        'origin_location_id',
        'destination_location_id',
        'status',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'shipment_date' => 'datetime',
        'estimated_arrival' => 'datetime',
        'actual_arrival' => 'datetime',
    ];

    /**
     * Get the booking associated with the shipment.
     */
    public function booking()
    {
        return $this->belongsTo(FleetBooking::class, 'booking_id');
    }

    /**
     * Get the fleet associated with the shipment.
     */
    public function fleet()
    {
        return $this->belongsTo(Fleet::class);
    }

    /**
     * Get the driver associated with the shipment.
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    /**
     * Get the origin location of the shipment.
     */
    public function originLocation()
    {
        return $this->belongsTo(Location::class, 'origin_location_id');
    }

    /**
     * Get the destination location of the shipment.
     */
    public function destinationLocation()
    {
        return $this->belongsTo(Location::class, 'destination_location_id');
    }

    /**
     * Get the items for the shipment.
     */
    public function items()
    {
        return $this->hasMany(ShipmentItem::class);
    }

    /**
     * Get the location checkpoints for the shipment.
     */
    public function locationCheckpoints()
    {
        return $this->hasMany(LocationCheckpoint::class);
    }

    /**
     * Get the latest location checkpoint for the shipment.
     */
    public function latestCheckpoint()
    {
        return $this->hasOne(LocationCheckpoint::class)->latest('checkpoint_time');
    }
}

