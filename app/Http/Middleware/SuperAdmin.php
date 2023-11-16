<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        {
            $user = auth('sanctum')->user();
            $token = PersonalAccessToken::findToken($request->bearerToken());

            if (blank($token)) {
                abort(401, 'Access denied');
            }
            if ($user->role_id != Role::SUPER_ADMIN) {
                abort(403, 'Unauthorized access');
            }
            return $next($request);
        }
    }
}
