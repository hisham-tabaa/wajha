<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {

        Log::info('SetLocale is work...!');
        $locale = $request->header('Accept-Language');

        if (!$locale) {
            $locale = $request->query('lang');
        }

        if (!$locale && session()->has('locale')) {
            $locale = session('locale');
        }

        $supported = ['en', 'ar'];
        if (!$locale || !in_array($locale, $supported)) {
            return __('error.setLocale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
