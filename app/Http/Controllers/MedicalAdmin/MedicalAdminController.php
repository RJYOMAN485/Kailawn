<?php

namespace App\Http\Controllers\MedicalAdmin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Medical;
use Illuminate\Http\Request;

class MedicalAdminController extends Controller
{
    public function index(Request $request)
    {
        // return auth('sanctum')->user();
        $search = $request->get("search");
        return [
            "data" => Medical::query()->where('user_id', auth('sanctum')->user()->id)
                ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', '%' . $search . '%'))
                ->orderBy('updated_at', 'desc')->with('specialization')->get()
        ];
    }


    public function update(Request $request, Medical $model)
    {

        $validated = $request->validate([
            'doctor_name' => 'required',
            'specialization_id' => 'required',
            'appointment_type' => 'required',
            'clinic_name' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'fee' => 'required',
            'timing' => 'required',
            'is_active' => 'required'
        ]);


        $model->update(($validated));

        return response()->json([
            'message' => 'Successfully updated'
        ]);
    }



    public function bookings(Request $request)
    {
        $status = $request->get('status');
        $model_ids = Medical::query()->where('user_id', auth('sanctum')->user()->id)->pluck('id')->toArray();
        $bookings = Booking::query()->whereHasMorph('owner', Medical::class, fn ($query) => $query->whereIn('owner_id', $model_ids))
            ->when(filled($status), fn ($q) => $q->where('status', $status))
            ->get();
        return response()->json([
            'data' => $bookings
        ]);
    }


    public function updateBooking(Booking $model, Request $request)
    {
        $model_ids = Medical::query()->firstWhere('user_id', auth('sanctum')->user()->id)->pluck('id')->toArray();

        $bookings = Booking::query()->whereHasMorph('owner', Medical::class, fn ($query) => $query->whereIn('owner_id', $model_ids))->where('id', $model->id)->get();

        // return $bookings;
        abort_if(blank($bookings), 'Permission denied', 401);

        $model->status = $request->input('status');

        $model->save();

        return response()->json([
            'message' => 'Booking updated successfully'
        ]);
    }
}
