<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fleet_id',
        'maintenance_date',
        'maintenance_type',
        'description',
        'cost',
        'done_by',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'maintenance_date' => 'date',
        'cost' => 'decimal:2',
    ];

    /**
     * Get the fleet that owns the maintenance record.
     */
    public function fleet()
    {
        return $this->belongsTo(Fleet::class);
    }
}

