<?php

namespace App\Http\Middleware;

use Closure;
use Modules\User\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle($request, Closure $next, $names)
    {
        $user = User::find(Auth::id());

        // حول البرميشنات من string إلى array
        $permissions = explode('|', $names);
        // Log::info('CheckPermission@permissions', $permissions);
        foreach ($permissions as $name) {
            if ($user->role && $user->role->hasPermissionTo(trim($name))) {
                return $next($request);
            }
        }

        return response()->json([
            'data' => [],
            'status' => 403,
            'message' => 'غير مصرح للدخول'
        ], 403);
    }
}
