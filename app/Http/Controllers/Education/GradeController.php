<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Medical;
use Illuminate\Http\Request;
use League\CommonMark\Util\SpecReader;

class GradeController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Grade::query()->orderBy('updated_at', 'DESC')->get(['id', 'name'])
        ]);
    }


    public function show(Grade $model)
    {
        return response()->json([
            'data' => $model
        ]);
    }



}
