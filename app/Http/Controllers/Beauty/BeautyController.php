<?php

namespace App\Http\Controllers\Beauty;

use App\Http\Controllers\Controller;
use App\Models\Beauty;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class BeautyController extends Controller
{
    public User $authUser;

    public function __construct()
    {
        $this->authUser = auth()->user() ?? User::find(1);
    }
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
            'phone_no' => 'required|min:10|max:10',
            'address' => 'required|min:3',
            'age' => 'required',
            'timing' => 'required',
            'category_name' => 'required', // category name = 'Beauty'
            // 'booking_date' => 'required',
            // 'status' => 'required',
            // 'is_paid' => 'required',

        ]);

        $bookings = $model->bookings()->create([
            ...$validated,
            'user_id' => $this->authUser->id,
            'booking_date' => now(),
            'status' => 'pending'
        ]);
        //After Successfull payment
        //1. Update status = 'success',
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
