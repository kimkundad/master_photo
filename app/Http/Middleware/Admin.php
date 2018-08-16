<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next SESSION_DOMAIN=nakhonkoratcarrent.com
     * @return mixed
     */
     public function handle($request, Closure $next)
    {


      //dd(Auth::check());
        if (Auth::check() && Auth::user()->Admin()) { //check the proper role
            //dd($request);
            return $next($request);
        }
        else {
            return redirect()->guest('/login');
        }
    }
}
