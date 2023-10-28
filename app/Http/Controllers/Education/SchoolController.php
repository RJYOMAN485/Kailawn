<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\School;
use App\Models\Subject;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $data = School::query()->get();

        return response()->json([
            'data' => $data
        ]);
    }


    public function show(School $model)
    {
        return response()->json([
            'data' => $model
        ]);
    }

    public function showByGrade(Grade $grade)
    {
        // return $grade->id;
        $data = School::query()->whereHas('subjects', fn ($q) => $q->whereHas('grade', fn ($q) => $q->where('id', $grade->id)))->get();


        return [
            'data' => $data
        ];
    }




    public function showBySubject(Subject $subject)
    {
        // return $subject;
        $data = School::query()->whereHas('subjects', fn ($q) => $q->where('subject_id', $subject->id))->get();

        return [
            'data' => $data
        ];
    }
}
