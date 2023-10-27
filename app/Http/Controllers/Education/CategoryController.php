<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Qualification;
use App\Models\School;
use App\Models\TuitionCenter;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $data['home_tuition'] = Qualification::query()->get();
        $data['tuition_center'] = TuitionCenter::query()->get(['name']);
        $data['school'] = School::query()->get(['name']);

        return [
            $data
        ];
    }
}
