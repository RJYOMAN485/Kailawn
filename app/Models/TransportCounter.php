<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportCounter extends Model
{
    use HasFactory;

    const FILLABLE = [
        'name',
        'driver_name',
        'address',
        'vehicle_no',
        'phone_no',
        'description',
        'timing',
        'is_active',
        // 'rate',
    ];

    protected $fillable = self::FILLABLE;

    protected $appends = ['destinations'];


    //Sumo tlan theihna khua
    public function counterVillages()
    {
        return $this->belongsToMany(Village::class, 'counter_villages', 'counter_id', 'village_id');
    }

    public function bookings()
    {
        return $this->hasMany(CounterBooking::class,'counter_id','id');
    }

    public function getDestinationsAttribute() {
        return $this->counterVillages()->get(['villages.id','villages.name']);
    }
}
