<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->where('role_id', Role::USER)->get();
        $schools = User::query()->where('role_id', Role::SCHOOL)->get();
        $beauties = User::query()->where('role_id', Role::BEAUTY)->get();
        $transports = User::query()->where('role_id', Role::TRANSPORT)->get();

        return response()->json([
            'users' => $users,
            'schools' => $schools,
            'beauties' => $beauties,
            'transports' => $transports
        ]);
    }


    public function show(User $model){
        return response()->json([
            'data' => $model
        ]);
    }

public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $user = new User($validated);
        $user->save();
        return response()->json([
            'message' => 'Data saved successfully'
        ]);
    }
    public function update(Request $request, User $model)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            // 'password' => 'required',
            'role_id' => 'required'
        ]);

        $model->update($validated);

        return response()->json([
            'message' => 'Data saved successfully'
        ]);
    }

    public function destroy(User $model)
    {
        $model->delete();
        return response()->json([
            'message' => 'User deleted',
        ]);
    }
}
