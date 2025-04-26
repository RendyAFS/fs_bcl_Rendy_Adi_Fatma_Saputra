<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
        'latitude',
        'longitude',
    ];

    /**
     * Get the bookings that have this location as origin.
     */
    public function originBookings()
    {
        return $this->hasMany(FleetBooking::class, 'origin_location_id');
    }

    /**
     * Get the bookings that have this location as destination.
     */
    public function destinationBookings()
    {
        return $this->hasMany(FleetBooking::class, 'destination_location_id');
    }

    /**
     * Get the shipments that have this location as origin.
     */
    public function originShipments()
    {
        return $this->hasMany(Shipment::class, 'origin_location_id');
    }

    /**
     * Get the shipments that have this location as destination.
     */
    public function destinationShipments()
    {
        return $this->hasMany(Shipment::class, 'destination_location_id');
    }
}

