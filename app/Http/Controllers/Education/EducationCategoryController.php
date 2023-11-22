<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\HomeTuition;
use App\Models\School;
use App\Models\TuitionCenter;
use Illuminate\Http\Request;

class EducationCategoryController extends Controller
{
    public function index() {
        $data['home_tuition'] = HomeTuition::query()->get();
        $data['tuition_center'] = TuitionCenter::query()->get();
        $data['school'] = School::query()->get();

        return response()->json([
            'data' => $data
        ]);

    }
}
