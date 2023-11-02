<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;


    public function specialization() {
        return $this->belongsTo(Specialization::class,'specialization_id','id');
    }

    public function bookings() {
        return $this->morphMany(Booking::class,'owner');
    }
}
