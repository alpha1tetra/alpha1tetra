<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthif
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
        if ($guard === "user" && Auth::guard($guard)->check()) {
            return $next($request);
        }
        if (!Auth::guard($guard)->check()) {
            return redirect('user/login');
        }
    }
}
