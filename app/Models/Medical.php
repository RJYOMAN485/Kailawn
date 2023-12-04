<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;

    const FILLABLE = [
        'user_id',
        'doctor_name',
        'specialization_id',
        'appointment_type',
        'clinic_name',
        'address',
        'phone_no',
        'fee',
        'timing',
        'is_active',
    ];

    protected $fillable = self::FILLABLE;


    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id', 'id');
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'owner');
    }
}
