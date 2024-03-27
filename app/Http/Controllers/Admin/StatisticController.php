<?php
namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Category;
use App\Models\Order;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class StatisticController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $categories = Category::all();
        // tổng sản phẩm
        $totalProducts = Products::count();
        //top 5 kh mua hàng nhiều nhất
        $topBuyers = Order::select('user_id', DB::raw('count(*) as total_orders'))
                    ->groupBy('user_id')
                    ->orderByDesc('total_orders')
                    ->limit(5)
                    ->get();
                    // top 10 lượt xem sản phẩm nhiều nhất
        $topViewedProducts = Products::orderByDesc('view_count')->limit(10)->get();
        //sản phẩm được xem nhiều nhất
        $mostViewedProduct = Products::orderByDesc('view_count')->first();
        return view('admin.statistics.statistics', compact('products', 'categories', 'totalProducts', 'topBuyers', 'topViewedProducts', 'mostViewedProduct'));
    }
}