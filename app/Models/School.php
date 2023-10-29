<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;


    protected $guarded = [];


    protected $hidden = ['pivot'];


    protected $appends = ['admission_open','facilities'];




    public function subjectsOffered() {
        return $this->belongsToMany(Subject::class,'school_subjects_offered','school_id','subject_id');
    }


    public function admissions() {
        return $this->hasMany(Admission::class,'school_id','id');
    }

    public function facilities() {
        return $this->belongsToMany(Facility::class,'school_facilities','school_id','facility_id');
    }


    function getAdmissionOpenAttribute()  {
        return $this->subjectsOffered()->where('admission_open',true)->exists();
    }

    function getFacilitiesAttribute() {
        return $this->facilities()->pluck('name');
    }







}
