<?php

namespace App\Http\Middleware;

use Closure;

class Userpabean
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
        if( auth()->check() && auth()->user()->isUserpabean() ) {
            return $next($request);
        }

        return redirect('/pabean/login');
    }
}
