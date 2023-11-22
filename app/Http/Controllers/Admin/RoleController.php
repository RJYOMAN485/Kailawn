<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::query()->with('users')->get();

        return response()->json([
            'roles' => $roles,
        ]);
    }


    public function show(Role $model)
    {
        return response()->json([
            'data' => $model->load('users')
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $user = new Role($validated);
        $user->save();
        return response()->json([
            'message' => 'Data saved successfully'
        ]);
    }
    public function update(Request $request, Role $model)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $model->update($validated);

        return response()->json([
            'message' => 'Data saved successfully'
        ]);
    }

    public function destroy(Role $model)
    {
        $model->delete();
        return response()->json([
            'message' => 'User deleted',
        ]);
    }
}
