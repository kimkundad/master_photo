<?php

namespace App\Http\Middleware;

use Closure;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $roles)
     {
       $request->user()->authorizeRoles(explode("|", $roles));
       return $next($request);
     }
}
