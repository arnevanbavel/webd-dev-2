<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //https://laracasts.com/discuss/channels/general-discussion/create-middleware-to-auth-admin-users?page=0
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->admin() )
        {
            return $next($request);
        }

        return redirect('/');
    }
}
