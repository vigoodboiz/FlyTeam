<?php
namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class StatisticController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $categories = Category::all();

        return view('admin.statistics.statistics', compact('products', 'categories'));
    }
}