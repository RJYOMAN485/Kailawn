<?php

namespace App\Http\Controllers\CounterAdmin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CounterBooking;
use App\Models\TransportCounter;
use Illuminate\Http\Request;

class CounterAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get("search");

        return [
            "data" => TransportCounter::query()->where('user_id', auth('sanctum')->user()->id)
                ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%"))
                ->get()
        ];
    }

    public function update(Request $request, TransportCounter $model)
    {

        $exists = TransportCounter::query()->where('user_id', auth('sanctum')->user()->id)->where('id', $model->id)->exists();

        !$exists && abort(401);

        $validated = $request->validate([
            'name' => 'required',
            'driver_name' => 'required',
            'address' => 'required',
            'vehicle_no' => 'required',
            'phone_no' => 'required',
            'description' => 'required',
            'timing' => 'required',
            'is_active' => 'required',
            // 'village_ids' => 'nullable'
        ]);

        $model->update($validated);


        //EG: village_ids = [1,2,3]
        $village_ids = $request->get('village_ids');
        filled($village_ids) && $model->counterVillages()->sync($village_ids);

        return response()->json([
            'message' => 'Successfully updated'
        ]);
    }



    public function bookings(Request $request)
    {
        $status = $request->get('status');
        $model_ids = TransportCounter::query()->where('user_id', auth('sanctum')->user()->id)->pluck('id')->toArray();
        $bookings = CounterBooking::query()->whereIn('counter_id', $model_ids)
            ->when(filled($status), fn ($q) => $q->where('status', $status))
            ->get();
        return response()->json([
            'data' => $bookings
        ]);
    }



    public function updateBooking(CounterBooking $model, Request $request)
    {
        //TO PREVENT UNAUTHORISED UPDATE
        $model_ids = TransportCounter::query()->where('user_id', auth('sanctum')->user()->id)->pluck('id')->toArray();
        $bookings = CounterBooking::query()->where('id',$model->id)->whereIn('counter_id', $model_ids)->get();
        abort_if(blank($bookings), 401, 'Permission denied');


        $validated = $request->validate([
            'village_id' => 'required',
            'seat_no' => 'required',
            'rate' => 'required',
            'booking_date' => 'required',
            'notes' => 'required',
            'status' => 'required'
        ]);

        $model->update($validated);

        return response()->json([
            'message' => 'Booking updated successfully'
        ]);
    }
}
