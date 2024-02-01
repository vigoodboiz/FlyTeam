<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        Gate::define('admin/dashboard', function ($user) {

                if ($user->role_id == "1" && $user->role_id == '2') {
          
                    return view('admin.dashboard');
          
                }
          
                return false;
          
            });
            Gate::define('view-page-guest', function ($user) {

                if ($user->role_id == "3") {
          
                    return true;
          
                }
          
                return false;
          
            });
    }
}