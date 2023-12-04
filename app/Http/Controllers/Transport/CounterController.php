<?php

namespace App\Http\Controllers\Transport;

use App\Http\Controllers\Controller;
use App\Models\CounterBooking;
use App\Models\TransportCounter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get("search");

        $destination_id = $request->get("destination_id");

        $booking_date = $request->get("booking_date");

        $data = TransportCounter::query()
            ->when(filled($search), fn ($q) => $q->where("name", "like", "%" . $search . "%"))
            ->when(filled($destination_id), fn ($q) => $q->whereHas('counterVillages', fn ($query) => $query->where('counter_villages.village_id', $destination_id)))
            ->get()->map(function (TransportCounter $counter) use ($booking_date) {
                return [
                    ...$counter->toArray(),
                    'seats_occupied' => $counter->bookings()
                        ->when(filled($booking_date), fn ($q) => $q->where('booking_date', $booking_date))
                        ->pluck('seat_no')->toArray(),

                ];
            });


        return response()->json([
            'data' => $data
        ]);
    }

    public function storeBooking(TransportCounter $model, Request $request)
    {

        $booking = new CounterBooking();
        //change this to auth()->user()->id only.
        $booking->user_id = auth()->user()->id ?? 1;
        $booking->counter_id = $model->id;
        $booking->village_id = $request->get('village_id');
        $booking->seat_no = $request->get('seat_no');
        $booking->rate = $request->get('rate');
        $booking->booking_date = $request->get('booking_date');
        $booking->notes = $request->get('notes') ?? null;

        $booking->save();

        return response()->json([
            'message' => 'Booking success'
        ]);
    }
}
