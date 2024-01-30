<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('view-page-guest', function ($user) {

            if ($user->role_id == "3") {
      
                return true;
      
            }
      
            return false;
      
        });
        Gate::define('admin.dashboard', function ($user) {

            if ($user->role_id == "1" && $user->role_id == '2') {
      
                return view('admin.dashboard');
      
            }
      
            return false;
      
        });
    }
}