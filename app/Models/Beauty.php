<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beauty extends Model
{
    use HasFactory;

    protected $guarded = [];

    const FILLABLE = [
        'name',
        'user_id',
        'address',
        'phone_no',
        'description',
        'is_active',
        'type',
        'fee'
    ];


    public function admin(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'owner');
    }
}
