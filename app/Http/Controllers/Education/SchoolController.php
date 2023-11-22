<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Grade;
use App\Models\School;
use App\Models\Subject;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $data = School::query()
            // ->with(['facilities' => function ($query) {
            //     return $query->select('name')->pluck('name');
            // //    return $query->pluck('name');
            // }])
            ->get();


        // return $data['facilities'];

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
        $data = School::query()->whereHas('subjectsOffered', fn ($q) => $q->whereHas('grade', fn ($q) => $q->where('id', $grade->id)))->get();


        return [
            'data' => $data
        ];
    }




    public function showBySubject(Subject $subject)
    {
        // return $subject;
        $data = School::query()->whereHas('subjectsOffered', fn ($q) => $q->where('subject_id', $subject->id))->get();

        return [
            'data' => $data
        ];
    }


    public function storeAdmission(School $school, Request $request)
    {
        $admission = $school->admissions()->create($request->only(Admission::ATTRIBUTES));

        $admission->user_id = auth()->id() ?? 1;

        $admission->save();

        return response()->json([
            'message'  => 'Admission saved successfully'
        ], 200);
    }

    public function getAvailableAdmission(School $school)
    {
        $data =  $school->subjectsOffered()->where('admission_open', true)->get();

        return [
            'data' => $data
        ];
    }


    public function getSubjectOffer(School $school)
    {
        // return $school->subjectsOffered()->get(['subjects.id','subjects.name']);
        return $school->subjectsOffered()->get()->map(function (Subject $subject) {
            return [
                'id' => $subject->id,
                'name' => $subject->name,
                'grade_name' => $subject->grade_name
            ];
        });
    }
}
