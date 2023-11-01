<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserAdmission() {
        // return 'admission';
        $authUser = auth()->user() ?? User::query()->first();
        $admissions = $authUser?->admissions()->get()->map(function(Admission $admission) {
            return [
                'class' => $admission->class,
                'submitted_date' => $admission->updated_at->format('d/m/Y'),
                'status' => $admission->status
            ];
        });


        return response()->json([
            'data' => $admissions
        ]);
    }


    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|unique:users,email',
    //         'password' => 'required',
    //         'role_id' => 'required'
    //     ]);

    //     User::query()->create($validated);

    //     return response()->json(['message' => 'User Registration Success']);
    // }

    // public function destroy(User $user) {
    //     $user->delete();

    //     return response()->json(['message' => 'User Deleted']);

    // }
}
