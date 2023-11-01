<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use App\Models\Medical;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $house_call = Medical::query()->where('appointment_type', 'house_call')
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('doctor_name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%")->orWhere('clinic_name', 'LIKE', "%$search%"))
            ->get();
        $clinic_booking = Medical::query()->where('appointment_type', 'clinic_booking')->get();

        return response()->json([
            'house_call' => $house_call,
            'clinic_booking' => $clinic_booking,
        ]);
    }


    public function show(Medical $model)
    {
        return response()->json([
            'data' => $model,
        ]);
    }



    public function showBySpecialization($id)
    {
        return response()->json([
            'data' => Medical::find($id)
        ]);
    }
}
