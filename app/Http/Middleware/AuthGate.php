<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Providers\RouteServiceProvider;

class AuthGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user) {
            $roles = Role::with('permissions')->get();
            $permissionArray = [];
            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissionArray[$permission->title][] = $role->id;
                }
            }

            foreach ($permissionArray as $title => $roles) {
                Gate::define($title, function (User $user) use ($roles) {
                    return in_array($user->role_id, $roles);
                });
            }
        }
        // if (Auth::check()) {
        //     if($user->role_id == 1 && $user->role_id == 2){
        //         return redirect()->route('dashboard');
        //     } else {
        //         return redirect()->route('home');
        //     }
        // };
        return $next($request);

    }
}