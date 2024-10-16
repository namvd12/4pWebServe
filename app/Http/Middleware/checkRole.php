<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class checkRole
{
    private $timeout = 2;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          // check user is login 
        if (session()->has('userKey')) {           
            if((now()->diffInHours(session('lastActivityTime')) < $this->timeout))
            {
                session(['lastActivityTime' => now()]);
                return $next($request);
            }
        }
        $fullPath = $request->fullUrl();
        // $queryString = $request->getQueryString();
        // $fullPath = $queryString ? $path . '?' . $queryString : $path;
        return redirect()->route('login',['nextRequest' => $fullPath]);
    }
}