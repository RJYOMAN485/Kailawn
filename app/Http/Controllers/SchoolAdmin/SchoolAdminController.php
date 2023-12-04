<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolAdminController extends Controller
{
    public function index()
    {
        return [
            "data" => School::query()->where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->with('subjectsOffered')->get()
        ];
    }



    public function update(Request $request)
    {
        $model = School::query()->firstWhere('user_id', auth()->user()->id);

        DB::transaction(function () use ($model, $request) {
            $model->update($request->only(School::FILLABLE));
            $model->subjectsOffered()->sync($request->input('subject_ids'));
            $model->facilities()->sync($request->input('facility_ids'));
        });

        return response()->json([
            'message' => 'Successfully updated'
        ]);
    }


    public function getAdmissions(Request $request)
    {
        $school = School::query()->firstWhere('user_id', auth()->user()->id);
        $admissions = Admission::query()->where('school_id', $school->id)->where('is_paid', true)->orderBy('updated_at', 'desc')
            ->with(['school', 'subject', 'user'])
            ->get();


        return response()->json([
            'data' => $admissions
        ]);
    }

    public function updateAdmission(Admission $model, Request $request)
    {
        $school = School::query()->firstWhere('user_id', auth()->user()->id);
        abort_if($model->school_id != $school->id, 'Permission denied', 401);

        $model->status = $request->input('status');
        $model->save();

        return response()->json([
            'message' => 'Admission updated successfully'
        ]);
    }
}
