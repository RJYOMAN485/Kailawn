<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportRental extends Model
{
    use HasFactory;

    const FILLABLE = [
        'name',
        'vehicle_type',
        'vehicle',
        'seat_capacity',
        'carrier',
        'registration',
        'rate',
        'owner',
        'address',
        'phone_no',
    ];

    protected $fillable = self::FILLABLE;
}
