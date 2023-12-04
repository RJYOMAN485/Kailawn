<?php

namespace App\Http\Controllers\MedicalAdmin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Medical;
use Illuminate\Http\Request;

class MedicalAdminController extends Controller
{
    public function index()
    {
        return [
            "data" => Medical::query()->where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->with('specialization')->get()
        ];
    }


    public function update(Request $request)
    {
        $model = Medical::query()->firstWhere('user_id', auth()->user()->id);


        $model->update($request->only(Medical::FILLABLE));

        return response()->json([
            'message' => 'Successfully updated'
        ]);
    }



    public function bookings(Request $request)
    {
        $model = Medical::query()->firstWhere('user_id', auth()->user()->id);
        $bookings = Booking::query()->whereHasMorph('owner', Medical::class, fn($query) => $query->where('owner_id', $model->id))->get();
        return response()->json([
            'data' => $bookings
        ]);
    }


    public function updateBooking(Booking $model, Request $request)
    {
        $model = Medical::query()->firstWhere('user_id', auth()->user()->id);

        $bookings = Booking::query()->whereHasMorph('owner', Medical::class, fn($query) => $query->where('owner_id', $model->id))->exists();

        abort_if(!$bookings, 'Permission denied', 401);

        $model->status = $request->input('status');

        $model->save();

        return response()->json([
            'message' => 'Booking updated successfully'
        ]);
    }
}
