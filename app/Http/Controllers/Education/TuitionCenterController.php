<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\HomeTuition;
use App\Models\Subject;
use App\Models\TuitionCenter;
use Illuminate\Http\Request;

class TuitionCenterController extends Controller
{
    public function index()
    {
        $data = TuitionCenter::query()->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function show(TuitionCenter $model)
    {
        return response()->json([
            'data' => $model
        ]);
    }

    public function showByGrade(Grade $grade)
    {
        // return $grade->id;

        $data = TuitionCenter::query()->whereHas('subjects', fn ($q) => $q->whereHas('grade', fn ($q) => $q->where('id', $grade->id)))->get();

        return [
            'data' => $data
        ];
    }




    public function showBySubject(Subject $subject)
    {
        // return $grade->id;
        $data = TuitionCenter::query()->whereHas('subjects', fn ($q) => $q->where('subject_id', $subject->id))->get();

        return [
            'data' => $data
        ];
    }
}
