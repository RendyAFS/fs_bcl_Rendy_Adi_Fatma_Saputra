<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'shipment_id',
        'item_name',
        'quantity',
        'weight',
        'volume',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'weight' => 'decimal:2',
        'volume' => 'decimal:2',
    ];

    /**
     * Get the shipment that owns the item.
     */
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
