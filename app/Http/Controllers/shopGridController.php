<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;


class shopGridController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $products = Products::with('category')->paginate(9);
        // sản phẩm mới
        $new_product = Products::orderBy('created_at', 'DESC')->limit(3)->get();
        // sản phẩm sale
        $sale_product = Products::where('price_sale', '!=', 0)->get();
        // lấy giá trị min , max của price
        $minPri = Products::min('price');
        $maxPri = Products::max('price');
        return view('page.shop-grid', compact('categories', 'products', 'new_product', 'sale_product', 'minPri', 'maxPri'));
    }

    public function fillCate($id_cate)
    {
        $categories = Category::all();
        $products = Products::where('id_category', $id_cate)->paginate(9);
        // sản phẩm mới
        $new_product = Products::orderBy('created_at', 'DESC')->limit(3)->get();
        // sản phẩm sale
        $sale_product = Products::where('price_sale', '!=', 0)->get();
        // lấy giá trị min , max của price
        $minPri = Products::min('price');
        $maxPri = Products::max('price');
        return view('page.shop-grid', compact('categories', 'products', 'new_product', 'sale_product', 'minPri', 'maxPri'));
    }

    public function fillPrice(Request $request)
    {

        $categories = Category::all();
        // sản phẩm mới
        $new_product = Products::orderBy('created_at', 'DESC')->limit(3)->get();
        // sản phẩm sale
        $sale_product = Products::where('price_sale', '!=', 0)->get();

        $priceRange = $request->input('price_range');
        $prices = explode(" - ", $priceRange);

        $minPrice = $prices[0];
        $maxPrice = $prices[1];
        // lấy giá trị min , max của price
        $minPri = Products::min('price');
        $maxPri = Products::max('price');
        // lọc sp theo price
        $products = Products::query()
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->paginate(9);

        return view('page.shop-grid', compact('categories', 'products', 'new_product', 'sale_product', 'minPri', 'maxPri'));
    }
}
