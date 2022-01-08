<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KepalaDesa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->level_id <= 2) {
            return $next($request);
        }
        return redirect('/');
    }
}
