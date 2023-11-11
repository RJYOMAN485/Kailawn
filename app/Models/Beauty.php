<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beauty extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function bookings() {
        return $this->morphMany(Booking::class,'owner');
    }
}
