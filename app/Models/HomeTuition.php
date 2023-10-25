<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTuition extends Model
{
    use HasFactory;

    protected $fillable = [];


    public function subjects() {
        return $this->belongsToMany(HomeTuition::class,'home_tuitions_subject','home_tuition_id','subject_id');
    }

}
