<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get("search");
        return [
            "data" => School::query()->where('user_id', auth('sanctum')->user()->id)
                ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', '%' . $search . '%'))
                ->orderBy('updated_at', 'desc')->with('subjectsOffered')->get()
        ];
    }



    public function update(Request $request, School $model)
    {
        // return $request->all();
        $validated =  $request->validate([
            'name' => 'required',
            'timing' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'rules_regulations' => 'required',
            'description' => 'required',
            'fees_structure' => 'required',
            'email' => 'required',
            'instagram_link' => 'required',
            'youtube_link' => 'required',
            'facebook_link' => 'required',
            'is_active' => 'required',
        ]);

        DB::transaction(function () use ($model, $request, $validated) {
            $model->update($validated);
            filled($request->input('subject_ids')) && $model->subjectsOffered()->sync($request->input('subject_ids'));
            filled($request->input('facility_ids')) && $model->facilities()->sync($request->input('facility_ids'));
        });

        return response()->json([
            'message' => 'Successfully updated'
        ]);
    }


    public function getAdmissions(Request $request)
    {
        $status = $request->get('status');
        $search = $request->get('search');

        $school_ids = School::query()->where('user_id', auth('sanctum')->user()->id)->pluck('id')->toArray();
        $admissions = Admission::query()->whereIn('school_id', $school_ids)->where('is_paid', true)
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', '%' . $search . '%'))
            ->when(filled($status), fn ($q) => $q->where('status', $status))
            ->orderBy('updated_at', 'desc')
            ->with(['school', 'subject', 'user'])
            ->get();


        return response()->json([
            'data' => $admissions
        ]);
    }

    public function updateAdmission(Admission $model, Request $request)
    {
        $school_ids = School::query()->where('user_id', auth('sanctum')->user()->id)->pluck('id')->toArray();


        abort_if(!in_array($model->school_id, $school_ids), 401, 'Permission denied');

        $request->validate([
            'status' => 'required'
        ]);

        $model->status = $request->input('status');
        $model->save();

        return response()->json([
            'message' => 'Admission updated successfully'
        ]);
    }
}
