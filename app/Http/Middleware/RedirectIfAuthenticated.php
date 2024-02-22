<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Session\Guard;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::DASHBOARD);
            }
        }
        
        $user = Auth::user();
        if($user !== null){
            $roleId = $user->role_id;
        }
        $roleId = optional($user)->role_id;
        if (Auth::check() && Auth::user()->role_id == $roleId) {
            if($roleId == 1 && $roleId == 2){
                return redirect(RouteServiceProvider::DASHBOARD);
            }
            if($roleId == 3){
                return redirect(RouteServiceProvider::GUEST);
            }
        };
        return $next($request);
   

}
}