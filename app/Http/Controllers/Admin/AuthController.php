<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => Role::SUPER_ADMIN
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

    public function logout(Request $request)
    {
        // return auth('sanctum')->user();
        auth('sanctum')->user()?->currentAccessToken()?->delete();
        return response()->json([
            'data' => 'Logout successful'
        ], 200);
    }
}
