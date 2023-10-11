<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $guarded = [];

    const MEN = 1;
    const WOMEN = 2;
    const UNISEX = 3;
    const ALL = 4;


    public function categories() {
        return $this->belongsToMany(Category::class,'category_type','type_id','category_id')->withTimestamps();
    }
}
