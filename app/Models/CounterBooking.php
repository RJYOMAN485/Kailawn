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
        'notes',
        'status'
    ];

    protected $fillable = self::FILLABLE;

    protected $appends = ['user','counter'];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function counter() {
        return $this->belongsTo(TransportCounter::class,'counter_id','id');
    }

    public function getUserAttribute() {
        return $this->user()->select('id','name','email','role_id')->first();
    }

    public function getCounterAttribute() {
        return  $this->counter()->first();
    }
}
