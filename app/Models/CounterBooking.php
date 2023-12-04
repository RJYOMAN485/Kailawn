<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterBooking extends Model
{
    use HasFactory;

    const FILLABLE = [
        'counter_id',
        'user_id',
        'village_id',
        'seat_no',
        'rate',
        'booking_date',
        'notes'
    ];

    protected $fillable = self::FILLABLE;
}
