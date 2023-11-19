<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $guarded = [];


    const FILLABLE = [
        'name',
        'fee',
        'address',
        'type',
        'phone_no',
        'description',
        'is_active',
    ];
}
