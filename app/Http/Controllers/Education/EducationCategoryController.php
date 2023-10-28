<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\School;
use App\Models\TuitionCenter;
use Illuminate\Http\Request;

class EducationCategoryController extends Controller
{
    public function index() {
        $data['home_tuition'] = Grade::query()->get(['id','name']);
        $data['tuition_center'] = TuitionCenter::query()->get(['id','name']);
        $data['school'] = School::query()->get(['id','name']);

        return response()->json([
            'data' => $data
        ]);

    }
}
