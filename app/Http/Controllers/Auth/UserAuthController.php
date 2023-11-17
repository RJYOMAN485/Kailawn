<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    private User $authUser;


    public function __construct()
    {
        $this->authUser = auth()->user() ?? User::first();
    }
    public function index()
    {

        return response()->json(['data' => auth()->user()]);
    }

    public function login(Request $request)
    {
        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => Role::USER
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

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'email' => 'required|unique:users,email',
        ]);
        $result = User::query()->create([...$validated, 'role_id' => Role::USER]);

        return response()->json([
            'message' => 'Registration Successful!'
        ], 200);
    }


    public function logout(Request $request)
    {
        auth('sanctum')->user()?->currentAccessToken()?->delete();
        return response()->json([
            'data' => 'Logout successful'
        ], 200);
    }

    public function updateProfile(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $this->authUser->id,
            'password' =>  filled($request->password) ? 'required|confirmed|min:4' : 'nullable',
            'password_confirmation' => filled($request->password) ? 'required|min:4' : 'nullable',
        ]);


        $auth = User::query()->find($this->authUser->id);

        filled($request->password) && $auth->password = $request->password;

        $auth->name = $request->name;
        $auth->email = $request->email;
        $auth->save();

        return response()->json([
            'message' => 'Profile Updated'
        ], 200);
    }
}
