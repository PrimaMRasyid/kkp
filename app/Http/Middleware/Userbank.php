<?php

namespace App\Http\Middleware;

use Closure;

class Userbank
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
        if( auth()->check() && auth()->user()->isUserbank() ) {
            return $next($request);
        }

        return redirect('/bank/login');
    }
}
