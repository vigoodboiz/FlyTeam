<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $redirectRoute = $request->get('redirectRoute');

    if ($redirectRoute === 'welcome') {
        return view('welcome');
    } elseif ($redirectRoute === 'dashboard') {
        return view('dashboard');
    } elseif ($redirectRoute === 'unauthorized') {
        abort(403, 'Unauthorized');
    } elseif ($redirectRoute == 'login') {
        return view('auth.login');
    }
    else {
        return redirect()->route($redirectRoute);
    }
}

}