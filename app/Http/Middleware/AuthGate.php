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
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        };
        if ($user !== null) {
            $roleId = $user->role_id;
        }
        $roleId = optional($user)->role_id;
        if (Auth::check() && Auth::user()->role_id == $roleId) {
            if ($roleId == 1 && $roleId == 2) {
                $redirectRoute = 'dashboard';
            } else {
                $redirectRoute = 'welcome';
            }
        };
        return $next($request);

    }
}

