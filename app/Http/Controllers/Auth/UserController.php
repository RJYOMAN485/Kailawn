<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserAdmission()
    {
        // return 'admission';
        $authUser = auth('sanctum')->user();
        $admissions = $authUser?->admissions()->get()->map(function (Admission $admission) {
            return [
                'class' => $admission->class,
                'submitted_date' => $admission->updated_at->format('d/m/Y'),
                'status' => $admission->status
            ];
        });


        return response()->json([
            'data' => $admissions
        ]);
    }
    public function getUserBookings()
    {
        return response()->json([
            'data' => auth('sanctum')->user()?->bookings()->get()
        ]);
    }

    public function getUserCounterBookings(){
        return response()->json([
            'data' => auth('sanctum')->user()?->counterBookings()->get()
        ]);
    }
}
