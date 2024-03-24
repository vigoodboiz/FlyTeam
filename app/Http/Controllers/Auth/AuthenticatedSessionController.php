<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        Auth::check();
        if(Auth::user()->role_id == 3){

        return redirect()->intended(RouteServiceProvider::WELCOME)->with('success', 'Đăng nhập thành công!');
    } else {
        return redirect()->intended(RouteServiceProvider::DASHBOARD)->with('success', 'Đăng nhập admin thành công!');
    }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

       return view('auth.login');
    }
}