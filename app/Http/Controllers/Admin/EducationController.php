<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeTuition;
use App\Models\School;
use App\Models\TuitionCenter;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data['home_tuition'] = HomeTuition::query()->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "$search"))->orderBy('updated_at', 'ASC')->get();
        $data['tuition_center'] = TuitionCenter::query()->get();
        $data['school'] = School::query()->get();

        return response()->json([
            'data' => $data
        ]);
    }


    public function showHomeTuition(HomeTuition $model)
    {
        return response()->json([
            'data' => $model->load('subjects')
        ]);
    }

    public function showTuitionCenter(TuitionCenter $model)
    {
        return response()->json([
            'data' => $model->load('subjects')
        ]);
    }

    public function showSchool(School $model)
    {
        return response()->json([
            'data' => $model->load(['subjectsOffered','facilities'])
        ]);
    }

    public function updateHomeTuition(HomeTuition $model,Request $request)
    {
        $model->update($request->only(HomeTuition::FILLABLE));
        return response()->json([
            'data' => $model
        ]);
    }

    public function updateTuitionCenter(TuitionCenter $model,Request $request)
    {
        $model->update($request->only(HomeTuition::FILLABLE));
        return response()->json([
            'data' => $model
        ]);
    }
}
