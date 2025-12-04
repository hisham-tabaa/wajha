<?php

namespace Modules\Auth\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
  public function handle(Request $request, Closure $next)
    {

         $locale = $request->header('Accept-Language');

        if (!$locale) {
            $locale = $request->query('lang');
        }

        if (!$locale && session()->has('locale')) {
            $locale = session('locale');
        }

        $supported = ['en', 'ar'];
        if (!$locale || !in_array($locale, $supported)) {
            $locale = config('app.fallback_locale', 'en');
        }

        App::setLocale($locale);

        return $next($request);

    }


}
