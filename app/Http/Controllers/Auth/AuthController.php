<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {


        $auth = Auth::attempt([
            'enmail' => $request->email,
            'password' => $request->password,

        ]);
        if ($auth) {
            $auth = User::query()->firstWhere('email', $request->email);
            // if (!$auth->is_active)
            //     return response()->json(['message' => "Account not activated."], 400);
            $token = $auth->createToken('personal_access_token', [])->plainTextToken;
            return response()->json([
                'token' => $token,
                'user' => $auth,
                'message' => 'Login Successful!'
            ], 200);
        }
        return response()->json(['message' => "Invalid credential"], 400);
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'password',
            'email' => 'required|unique:users,email',
        ]);
        $result = User::query()->create($validated);

        return response()->json([
            'message' => 'Registration Successful!'
        ], 200);
    }
}
