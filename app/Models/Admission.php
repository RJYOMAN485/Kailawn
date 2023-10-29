<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $guarded = [];


    const ATTRIBUTES = [
        'name',
        'gender',
        'dob',
        'contact',
        'present_address',
        'district',
        'class',
        'fathers_name',
        'mothers_name',
        'fathers_contact',
        'mothers_contact',
        'last_school',
        'last_passed',
        'last_board',
        'division',
        'percentage',
        'major_core',
        'subject_id'
    ];


    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
