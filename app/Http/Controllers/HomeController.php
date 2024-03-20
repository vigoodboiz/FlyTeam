<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // abort_if(Gate::denies('guest_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all();
        $products_trending = Products::orderBy('view_count', 'desc')->limit(8)->get();
        $new_product = Products::orderBy('created_at', 'DESC')->limit(10)->get();
        $sale_product = Variant::where('price_sale', '!=', 0)->limit(10)->get();
        return view('page.index',compact('categories','products_trending','new_product','sale_product'));
    }
}
