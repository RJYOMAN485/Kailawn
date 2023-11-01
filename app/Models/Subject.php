<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;



    protected $hidden = ['pivot'];

    public function grade() {
        return $this->belongsTo(Grade::class,'grade_id','id');
    }

    public function schools() {
        return $this->belongsToMany(School::class,'school_subjects_offered','subject_id','school_id');

    }

    public function homeTuitions() {
        return $this->belongsToMany(HomeTuition::class,'home_tuitions_subjects','subject_id','home_tuition_id');

    }


    public function tuitionCenter() {
        return $this->belongsToMany(TuitionCenter::class,'tuitions_centers_subjects','subject_id','tuition_center_id');

    }
}
