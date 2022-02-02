<?php

namespace App\Http\Middleware;

use Closure;

class TeamMiddleware
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
        if(auth()->check()){
            if(auth()->user()->role->name =="team"){
                return $next($request);
            } else {
                return redirect('404');
            }
        }
        return redirect('404');
    }
}
