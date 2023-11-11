<?php

namespace App\Http\Controllers\Transport;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public User $authUser;

    public function __construct()
    {
        $this->authUser = auth()->user() ?? User::find(1);
    }
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
}
