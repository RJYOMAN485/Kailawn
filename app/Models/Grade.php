<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;


    public function subject()
    {
        return $this->hasMany(Subject::class,'subject_id','id');
    }

    // public function schools() {
    //     return $this->hasManyThrough(School::class,Subject::class,)
    // }
}
