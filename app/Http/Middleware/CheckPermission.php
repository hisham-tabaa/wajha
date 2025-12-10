<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Models\User;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  string  $names  Permission names separated by |
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $names)
    {
        $user = User::find(Auth::id());
        if (! $user) {
            Log::warning('Unauthorized access attempt', [
                'ip' => $request->ip(),
                'route' => $request->path(),
            ]);

            return (new Controller)->errorResponse(
                null,
                401,
                'غير مسجل الدخول'
            );
        }

        $permissions = explode('|', $names);
        foreach ($permissions as $name) {
            if ($user->role && $user->role->hasPermissionTo(trim($name))) {
                return $next($request);
            }
        }

        Log::warning('Forbidden access attempt', [
            'user_id' => $user->id,
            'role' => $user->role ? $user->role->name : null,
            'required_permissions' => $permissions,
            'ip' => $request->ip(),
            'route' => $request->path(),
        ]);

        return (new Controller)->errorResponse(
            null,
            403,
            'غير مصرح بالدخول'
        );
    }
}
