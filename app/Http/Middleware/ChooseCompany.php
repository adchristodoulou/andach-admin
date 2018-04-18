<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class ChooseCompany
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
        if (!Auth::check())
        {
            return redirect()->route('login');
        }
            
        if (!Auth::user()->selectedCompany())
        {
            return redirect()->route('company.choose');
        }

        return $next($request);
    }
}
