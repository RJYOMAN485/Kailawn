<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTuition extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function subjects() {
        return $this->belongsToMany(Subject::class,'home_tuitions_subjects','home_tuition_id','subject_id');
    }


    // public function grades() {
    //     return $this->belongsToMany(HomeTuition::class,'home_tuitions_grades','home_tuition_id','grade_id')->withTimestamps();
    // }

}
