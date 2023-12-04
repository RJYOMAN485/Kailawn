<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Models\TransportCounter;
use App\Models\TransportRental;
use App\Models\User;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $counter = TransportCounter::query()->where('is_active', true)
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%"))
            ->get();
        $rental = TransportRental::query()->where('is_active', true)
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%"))
            ->get();

        return response()->json([
            'counter' => $counter,
            'rental' => $rental,
        ]);
    }


    public function showCounter(TransportCounter $model)
    {
        return response()->json([
            'data' => $model->load('bookings'),
        ]);
    }
    public function showRental(TransportRental $model)
    {
        return response()->json([
            'data' => $model,
        ]);
    }


    public function store(Request $request) {
        $transport = new Transport($request->only(Transport::FILLABLE));
        $transport->save();

        return response()->json([
            'message' => 'Data saved successfully',
        ]);

    }



    public function updateCounter(Request $request, TransportCounter $model)
    {
        $model->update($request->only(TransportCounter::FILLABLE));

        $model->counterVillages()->sync($request->input('destinations_id'));

        return response()->json([
            'data' => 'Successfully updated'
        ]);
    }
    public function updateRental(Request $request, TransportRental $model)
    {
        $model->update($request->only(TransportRental::FILLABLE));


        return response()->json([
            'data' => 'Successfully updated'
        ]);
    }


    public function assignUser(Request $request, Transport $model)
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



    public function destroy(Request $request, Transport $model)
    {
        $model->delete();
        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}
