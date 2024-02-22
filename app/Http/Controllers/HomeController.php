<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;

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
    } 
    else {
        return redirect()->route($redirectRoute);
    }
}

}