<?php

namespace App\Http\Controllers\Beauty;

use App\Http\Controllers\Controller;
use App\Models\Beauty;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class BeautyController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->get('search');
        $house_call = Beauty::query()->where('type', 'house_call')
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%"))
            ->get();
        $clinic_booking = Beauty::query()->where('type', 'booking')
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%"))
            ->get();

        return response()->json([
            'house_call' => $house_call,
            'clinic_booking' => $clinic_booking,
        ]);
    }


    public function show(Beauty $model)
    {
        return response()->json([
            'data' => $model,
        ]);
    }


    public function bookBeauty(Request $request, Beauty $model)
    {
        $validated =  $request->validate([
            'full_name' => 'required',
            'phone_no' => 'nullable',
            'address' => 'nullable',
            'age' => 'nullable',
            'timing' => 'required',
            'category_name' => 'required', // category name = 'Beauty'
            'booking_date' => 'required',
            'amount' => 'required',
            // 'is_paid' => 'required',

        ]);

        $bookings = $model->bookings()->create([
            ...$validated,
            'user_id' => auth('sanctum')->id(),
            'status' => 'pending'
        ]);
        //After Successfull payment
        //1. Update status = 'completed',
        //2. Update is_paid = true;
        $bookings->save();


        return response()->json([
            'message' => 'Redirect to payment...'
        ]);
    }


    public function paymentCallback(Request $request, Booking $booking)
    {
        //THIS IS DEMO FUNCTION FOR PAYMENT CALLBACK. PLEASE MODIFY
        if ($request->payment_status == 'success') {
            $booking->status = 'completed';
            $booking->is_paid = true;
        } else {
            $booking->status = 'pending';
            $booking->is_paid = false;
        }
        $booking->save();
        return response()->json([
            'message' => 'Payment status here'
        ]);
    }
}
