<?php

namespace App\Http\Controllers\Admin;

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
        $booking = Beauty::query()->where('type', 'booking')
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%"))
            ->get();

        return response()->json([
            'house_call' => $house_call,
            'booking' => $booking,
        ]);
    }


    public function show(Beauty $model)
    {
        return response()->json([
            'data' => $model,
        ]);
    }

    public function store(Request $request)
    {
        $beauty = new Beauty($request->only(Beauty::FILLABLE));
        $beauty->save();

        return response()->json([
            'message' => 'Data saved successfully'
        ]);
    }


    public function showBookings(Request $request)
    {
        $bookings = Booking::query()->whereHasMorph('owner', Beauty::class)->get();
        return response()->json([
            'data' => $bookings
        ]);
    }


    public function showBooking(Request $request, Beauty $model)
    {
        $bookings = Booking::query()->whereHasMorph('owner', Beauty::class, fn ($query) => $query->where('owner_id', $model->id))->get();
        return response()->json([
            'data' => $bookings
        ]);
    }


    public function update(Request $request, Beauty $model)
    {
        $model->update($request->only(Beauty::FILLABLE));
        return response()->json([
            'data' => 'Successfully updated'
        ]);
    }



    public function destroy(Request $request, Beauty $model)
    {
        $model->delete();
        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }

    public function assignUser(Request $request, Beauty $model)
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
}
