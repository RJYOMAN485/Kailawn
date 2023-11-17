<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeTuition;
use App\Models\School;
use App\Models\TuitionCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data['home_tuition'] = HomeTuition::query()->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "$search"))->orderBy('updated_at', 'ASC')->with('subjects')->get();
        $data['tuition_center'] = TuitionCenter::query()->with('subjects')->get();
        $data['school'] = School::query()->with('subjectsOffered')->get();

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
            'data' => $model->load(['subjectsOffered', 'facilities'])
        ]);
    }



    public function updateSchool(School $model, Request $request)
    {
        DB::transaction(function () use ($model, $request) {
            $model->update($request->only(School::FILLABLE));
            $model->subjectsOffered()->sync($request->input('subjects'));
            $model->facilities()->sync($request->input('facilities'));
        });

        return response()->json([
            'data' => 'Successfully updated'
        ]);
    }

    public function updateHomeTuition(HomeTuition $model, Request $request)
    {
        $model->update($request->only(HomeTuition::FILLABLE));

        $model->subjects()->sync($request->input('subjects'));

        return response()->json([
            'data' => 'Successfully updated'
        ]);
    }

    public function updateTuitionCenter(TuitionCenter $model, Request $request)
    {
        $model->update($request->only(HomeTuition::FILLABLE));


        $model->subjects()->sync($request->input('subjects'));

        return response()->json([
            'data' => 'Successfully updated'

        ]);
    }

    public function storeHomeTuition(Request $request)
    {
        $homeTuition = new HomeTuition($request->only(HomeTuition::FILLABLE));
        $homeTuition->save();
        $homeTuition->subjects()->sync($request->input('subjects'));

        return response()->json([
            'data' => 'Data saved successfully'
        ]);
    }
    public function storeTuitionCenter(Request $request)
    {
        $tuitionCenter = new TuitionCenter($request->only(TuitionCenter::FILLABLE));
        $tuitionCenter->save();
        $tuitionCenter->subjects()->sync($request->input('subjects'));

        return response()->json([
            'data' => 'Data saved successfully'
        ]);
    }
    public function storeSchool(Request $request)
    {
        $school = new School($request->only(School::FILLABLE));
        $school->save();
        $school->subjectsOffered()->sync($request->input('subjects'));
        $school->facilities()->sync($request->input('facilities'));
        return response()->json([
            'data' => 'Data saved successfully'
        ]);
    }

    public function destroy($str, $id)
    {
        switch ($str) {
            case 'home-tuition':
                HomeTuition::query()->findOrFail($id)->delete();
                break;

            case 'tuition-center':
                TuitionCenter::query()->findOrFail($id)->delete();
                break;

            case 'school':
                School::query()->findOrFail($id)->delete();
                break;

            default:
                return response()->json([
                    'message' => 'Invalid parameters'
                ], 400);
        }

        return response()->json([
            'message' =>  'Delete success'
        ], 200);
    }
}
