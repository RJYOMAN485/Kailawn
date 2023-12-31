<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Medical;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MedicalController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->get('search');
        $house_call = Medical::query()->where('appointment_type', 'house_call')
            ->when(filled($search), fn($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('doctor_name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%")->orWhere('clinic_name', 'LIKE', "%$search%"))
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
            'data' => $model->load('specialization')
        ]);
    }

    public function store(Request $request) {
        $medical = new Medical($request->only(Medical::FILLABLE));
        $medical->save();


        return response()->json([
            'message' => 'Data Saved Successfully'
        ]);

    }

    public function showBySpecialization($id)
    {
        return response()->json([
            'house_call' => Medical::query()->where('specialization_id', $id)->where('appointment_type', 'house_call')->get(),
            'clinic_booking' => Medical::query()->where('specialization_id', $id)->where('appointment_type', 'clinic_booking')->get(),
        ]);
    }


    public function showBookings(Request $request)
    {
        $bookings = Booking::query()->whereHasMorph('owner', Medical::class)->get();
        return response()->json([
            'data' => $bookings
        ]);
    }
    public function showBooking(Request $request, Medical $model)
    {
        $bookings = Booking::query()->whereHasMorph('owner', Medical::class, fn($query) => $query->where('owner_id', $model->id))->get();
        return response()->json([
            'data' => $bookings
        ]);
    }



    public function update(Request $request, Medical $model)
    {
        $model->update($request->only(Medical::FILLABLE));


        return response()->json([
            'data' => 'Successfully updated'
        ]);
    }

    public function assignUser(Request $request, Medical $model)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $admin = User::findOrFail($request->user_id);

        $model->admin()->associate($admin);

        $model->save();

        return response()->json([
            'message' => 'User assigned successfully'
        ]);
    }

    public function destroy(Request $request, Medical $model)
    {
        $model->delete();
        return response()->json([
            'data' => 'Deleted successfully'
        ]);
    }
}
