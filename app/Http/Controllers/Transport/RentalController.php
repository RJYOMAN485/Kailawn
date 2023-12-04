<?php

namespace App\Http\Controllers\Transport;

use App\Http\Controllers\Controller;
use App\Models\TransportRental;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = TransportRental::query()->where('is_active', true)
            ->when(filled($search), fn ($q) => $q->where('name', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%"))
            ->get();


        return response()->json([
            'data' => $data,
        ]);
    }


    public function show(TransportRental $model)
    {
        return response()->json([
            'data' => $model,
        ]);
    }
}
