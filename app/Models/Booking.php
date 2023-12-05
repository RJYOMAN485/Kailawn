<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;


    const FILLABLE = [
        'full_name',
        'phone_no',
        'address',
        'age',
        'timing',
        'category_name',
        'user_id',
        'booking_date',
        'status',
        'is_paid',
        'amount'
    ];

    protected $fillable = self::FILLABLE;


    public function owner()
    {
        return $this->morphTo('owner');
    }
}
