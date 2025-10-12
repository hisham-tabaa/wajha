<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class CustomThrottle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $maxAttempts = null, $decaySeconds = null): Response
    {
        // لو ما انبعتت قيم من الراوت → خذ الافتراضي من config
        $maxAttempts = $maxAttempts ?? config('throttle.maxAttempts');
        $decaySeconds = $decaySeconds ?? config('throttle.decaySeconds');

        $identifier = Auth::id() ?? $request->ip();
        $key = $identifier . '|' . $request->path();
        Log::info("awad = ", [$key]);
        // نعمل الـ limiter
        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);

            return response()->json([
                'status' => 'error',
                'message' => "تجاوزت الحد ($maxAttempts طلب خلال $decaySeconds ثانية). حاول بعد {$seconds} ثانية.",
            ], 429);
        }

        // تسجيل المحاولة
        RateLimiter::hit($key, $decaySeconds);

        return $next($request);
    }
}
