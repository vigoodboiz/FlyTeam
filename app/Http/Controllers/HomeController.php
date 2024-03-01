<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::all();
        $products_trending = Products::orderBy('view_count', 'desc')->limit(8)->get();
        return view('page.index',compact('categories','products_trending'));
    }
}
