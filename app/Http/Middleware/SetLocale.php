<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Language::where("lang", request()->segment(1))->first()) {
            app()->setLocale($request->segment(1));
        } else {
            app()->setLocale("az");
            abort(404);
        }
        return $next($request);
    }
}
