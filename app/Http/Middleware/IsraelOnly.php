<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IsraelOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $response = Http::get("https://api.ip2location.io/?key=someapikey&ip=$ip");

        
        $israelCode = 'IL';
        
        if ($response->json('country_code') !== $israelCode) {
            abort(403, 'שגיאה.');
        }

        return $next($request);
    }
}
