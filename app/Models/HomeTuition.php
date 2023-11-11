<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTuition extends Model
{
    use HasFactory;

    protected $guarded = [];

    const FILLABLE = [
        'address',
        'tutor_name',
        'timing',
        'fees_structure',
        'contact',
        'tutor_description',
        'description',
        'tutor_qualification',
        'special_subject',
        'is_active',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'home_tuitions_subjects', 'home_tuition_id', 'subject_id');
    }


    // public function grades() {
    //     return $this->belongsToMany(HomeTuition::class,'home_tuitions_grades','home_tuition_id','grade_id')->withTimestamps();
    // }

}
