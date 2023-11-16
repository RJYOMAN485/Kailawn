<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Medical;
use Illuminate\Database\Eloquent\Model;
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
            'data' => $model->load('specialization')
        ]);
    }

    public function showBySpecialization($id)
    {
        return response()->json([
            'data' => Medical::find($id)
        ]);
    }


    public function showBookings(Request $request)
    {
        $bookings = Booking::query()->whereHasMorph('owner', [Model::class])->get();
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


    public function paymentCallback(Request $request, Booking $booking)
    {
        //THIS IS DEMO FUNCTION FOR PAYMENT CALLBACK. PLEASE MODIFY
        if ($request->payment_status == 'success') {
            $booking->status = 'success';
            $booking->is_paid = true;
        } else {
            $booking->status = 'payment_failed';
            $booking->is_paid = false;
        }
        $booking->save();
        return response()->json([
            'message' => 'Payment status here'
        ]);
    }
}
