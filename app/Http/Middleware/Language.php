<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    public function handle(Request $request, Closure $next): Response
    {
        $langSesion = Session::get('applocale');
        array_key_exists($langSesion, config('languages')) ? App::setLocale($langSesion) : App::setLocale(Config('app.fallback_locale'));

        return $next($request);
    }
}
