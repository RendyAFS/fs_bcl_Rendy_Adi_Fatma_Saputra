<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'max_capacity',
    ];

    /**
     * Get the fleets for the vehicle type.
     */
    public function fleets()
    {
        return $this->hasMany(Fleet::class);
    }

    /**
     * Get the bookings for the vehicle type.
     */
    public function bookings()
    {
        return $this->hasMany(FleetBooking::class);
    }
}
