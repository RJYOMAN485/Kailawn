<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\HomeTuition;
use App\Models\Qualification;
use Illuminate\Http\Request;

class HomeTuitionController extends Controller
{
    public function index()
    {
        $data = Qualification::query()->get();
        return [
            'data' => $data
        ];
    }


    public function show(Qualification $qualification)
    {
        $data = HomeTuition::query()->whereHas('subjects', fn ($q) => $q->where('qualification_id', $qualification))->get();

        return [
            'data' => $data
        ];
    }
}
