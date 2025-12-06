<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Response\AppResponse;
use Modules\Auth\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param  string                   $names  Permission names separated by |
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $names)
    {
        $user = User::find(Auth::id());
        if (!$user) {
            Log::warning('Unauthorized access attempt', [
                'ip' => $request->ip(),
                'route' => $request->path(),
            ]);
            return response()->json(
                new AppResponse(
                    'failed',
                    null,
                    401,
                    __('errors.not_logged_in')
                ),
                401
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

        return (new Controller())->errorResponse(
            null,
            403,
            'غير مصرح بالدخول'
        );
    }
}
