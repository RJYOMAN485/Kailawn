<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function school(){
        return $this->belongsTo(School::class,'school_id','id');
    }


    public function stream(){
        return $this->belongsTo(Stream::class,'stream_id','id');
    }
}
