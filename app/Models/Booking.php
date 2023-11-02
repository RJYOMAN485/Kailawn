<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_no',
        'address',
        'age',
        'timing',
        'category_name',
        'user_id',
        'booking_date',
        'status',
    ];


    public function owner()
    {
        return $this->morphTo('owner');
    }
}
