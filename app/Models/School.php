<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function subjects() {
        return $this->belongsToMany(Stream::class,'school_subjects','school_id','stream_id');
    }
}
