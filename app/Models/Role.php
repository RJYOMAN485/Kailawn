<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const USER = 3;
    const SCHOOL = 4;

    const BEAUTY = 5;

    const COUNTER = 6;
    const MEDICAL = 7;






    protected $guarded = [];

    public function users() {
        return $this->hasMany(User::class,'role_id','id');
    }
}
