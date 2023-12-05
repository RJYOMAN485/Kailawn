<?php

namespace App\Http\Controllers\BeautyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Beauty;
use App\Models\Booking;
use Illuminate\Http\Request;

class BeautyAdminController extends Controller
{
    public function index()
    {
        return [
            "data" => Beauty::query()->where('user_id', auth('sanctum')->user()->id)->get()
        ];
    }

    public function update(Request $request, Beauty $model)
    {

        $exists = Beauty::query()->where('user_id', auth('sanctum')->user()->id)->where('id', $model->id)->exists();

        !$exists && abort(404);

        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'description' => 'nullable',
            'is_active' => 'required',
            'type' => 'required',
            'fee' => 'required'
        ]);

        $model->update($validated);

        return response()->json([
            'message' => 'Successfully updated'
        ]);
    }


    public function bookings(Request $request)
    {
        $status = $request->get('status');
        $model_ids = Beauty::query()->where('user_id', auth('sanctum')->user()->id)->pluck('id')->toArray();
        $bookings = Booking::query()->whereHasMorph('owner', Beauty::class, fn ($query) => $query->whereIn('owner_id', $model_ids))
        ->when(filled($status), fn ($q) => $q->where('status', $status))
        ->get();
        return response()->json([
            'data' => $bookings
        ]);
    }



    public function updateBooking(Booking $model, Request $request)
    {
        $model_ids = Beauty::query()->firstWhere('user_id', auth('sanctum')->user()->id)->pluck('id')->toArray();

        $bookings = Booking::query()->whereHasMorph('owner', Beauty::class, fn ($query) => $query->whereIn('owner_id', $model_ids))->where('id', $model->id)->get();

        abort_if(blank($bookings), 401,'Permission denied');

        $model->status = $request->input('status');

        $model->save();

        return response()->json([
            'message' => 'Booking updated successfully'
        ]);
    }
}
