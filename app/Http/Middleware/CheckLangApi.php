<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\Response;

class CheckLangApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('lang') && in_array($request->header('lang'), array_keys(LaravelLocalization::getSupportedLocales()))) {
            LaravelLocalization::setLocale($request->header('lang'));
        }
        return $next($request);
    }
}
