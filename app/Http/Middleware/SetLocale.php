<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Response\AppResponse;


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
            return response()->json(
                new AppResponse(
                    'failed',
                    null,
                    400,
                    __('errors.setLocale')
                ),
                400
            );
        }

        App::setLocale($locale);

        return $next($request);
    }
}
