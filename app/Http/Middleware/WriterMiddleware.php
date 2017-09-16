<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class WriterMiddleware
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
           if (Auth::user()->hasRole('writer') or Auth::user()->hasRole('admin')) {
               return $next($request);
            }
            else{
                 abort('401');
            }
        
        
    }
}
