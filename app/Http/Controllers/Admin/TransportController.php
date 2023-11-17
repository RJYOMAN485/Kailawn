<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $counter = Transport::query()->where('type', 'counter')->where('is_active', true)
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%"))
            ->get();
        $rental = Transport::query()->where('type', 'rental')->where('is_active', true)
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%"))
            ->get();

        return response()->json([
            'counter' => $counter,
            'rental' => $rental,
        ]);
    }


    public function show(Transport $model)
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



    public function update(Request $request, Transport $model)
    {
        $model->update($request->only(Transport::FILLABLE));


        return response()->json([
            'data' => 'Successfully updated'
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
