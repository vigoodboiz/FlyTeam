<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('page.index');
    }

}