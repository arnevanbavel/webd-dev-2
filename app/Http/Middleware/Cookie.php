<?php

namespace App\Http\Middleware;

use Closure;

class Cookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->hasCookie('firsttime')) {
            return $next($request);
        }
        else {
            $response = $next($request);
            return $response->withCookie(cookie()->forever('firsttime', 'OK'));
        }

        
    }
}
