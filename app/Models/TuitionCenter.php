<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionCenter extends Model
{
    use HasFactory;

    protected $fillable = self::FILLABLE;

    const FILLABLE = [
        'name',
        'timing',
        'address',
        'description',
        'contact',
        'rules_regulations',
        'fees_structure',
        'email',
        'instagram_link',
        'youtube_link',
        'facebook_link',
        'is_active',
    ];


    public function subjects() {
        return $this->belongsToMany(Subject::class,'tuition_centers_subjects','tuition_center_id','subject_id');
    }


    // public function grades() {
    //     return $this->belongsToMany(HomeTuition::class,'home_tuitions_grades','home_tuition_id','grade_id');
    // }
}
