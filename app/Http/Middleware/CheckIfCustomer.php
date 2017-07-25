<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check())  {
            if ( Auth::user()->group == 0 || !(Auth::user()) )
            {
                return redirect('/');
            } 
            elseif (Auth::user()->group == 1  || Auth::user()->group ==2) 
            {
                return redirect('/Manager.backend.home');
            } 
            // return redirect('/');
            // return response('Unauthorized.', 401);
            // return redirect()->guest('/');
        }
                    
        return $next($request);
    }
}
