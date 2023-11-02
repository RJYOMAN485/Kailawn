<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    public function medicals() {
        return $this->hasMany(Medical::class,'specialization_id','id');
    }
}
