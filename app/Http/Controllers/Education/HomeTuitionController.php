<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\HomeTuition;
use App\Models\School;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomeTuitionController extends Controller
{
    public function index()
    {
        $data = HomeTuition::query()->get();

        return response()->json([
            'data' => $data
        ]);
    }


    public function show(HomeTuition $model)
    {
        return response()->json([
            'data' => $model
        ]);
    }

    public function showByGrade(Grade $grade)
    {
        $data = HomeTuition::query()
            ->whereHas(
                'subjects',
                fn ($q) => $q->whereHas('grade', fn ($q) => $q->where('id', $grade->id))
            )->get();

        return [
            'data' => $data
        ];
    }




    public function showBySubject(Subject $subject)
    {
        // return $subject->id;
        $data = HomeTuition::query()->whereHas('subjects', fn ($q) => $q->where('subject_id', $subject->id))->get();

        return [
            'data' => $data
        ];
    }
}
