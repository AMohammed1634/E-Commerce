<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if(auth()->check())
        {
            if(auth()->user()->isAdmin == true)
            {
                return $next($request);
            }
            return redirect()->route("home");
        }
        return redirect()->route("login");
    }
}
