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
        // $user = Auth::user();
        // $role_id = Auth::guard($user)->role_id(); 
        // if(Auth::user()->role_id =='1'){
        //     return redirect(RouteServiceProvider::DASHBOARD);
        // }
        // if(Auth::user()->role_id == '3'){
        //     return view('template');
        // }
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                // return redirect(RouteServiceProvider::HOME);

              
                return redirect(RouteServiceProvider::DASHBOARD);
               

            }
            // if(Auth::guard($guard)->check($role_id == '3')){
            //     return view('template');
            // }
        }

        return $next($request);
    }

}