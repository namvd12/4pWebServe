<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // check admin 
        if (session()->has('userKey')) 
        {           
            $hasPermission = Permission::userHasPermission(['View_user','Edit_user', 'Delete_user']);
            if($hasPermission)
            {
                return $next($request);
            }
        }
        return redirect()->route('maintenacePlan');
    }
}