<?php

namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
// use Kamaln7\Toastr\Facades\Toastr;

class SentinelMiddleware
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
        if (Sentinel::guest()) {
             if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
            return redirect()->guest('login');
            }
        }
        return $next($request);
    }
}
