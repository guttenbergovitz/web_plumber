<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $supported = ['en', 'pl', 'de'];

        if ($request->has('lang') && in_array($request->lang, $supported)) {
            Session::put('locale', $request->lang);
        }

        $locale = Session::get('locale', $request->segment(1));

        if (!in_array($locale, $supported)) {
            $locale = config('app.locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
