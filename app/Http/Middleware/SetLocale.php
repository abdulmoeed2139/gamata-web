<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1); // language prefix jaise 'en', 'si', 'ta'

        if (in_array($locale, ['en', 'si', 'ta'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('en'); // default
        }

        return $next($request);
    }
}
