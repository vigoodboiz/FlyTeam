<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Order;
use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPendingOrders = Order::where('payment_status', 'Đã Thanh Toán')->count();
        $totalPaidAmount = Order::where('payment_status', 'Đã Thanh Toán')->sum('total_price');

        $todaysEarnings = Order::where('payment_status', 'Đã Thanh Toán')
            ->whereDate('created_at', Carbon::today())->sum('total_price');

        $monthEarnings = Order::where('payment_status', '!=', 'Đã Thanh Toán')
            ->whereMonth('created_at', Carbon::now()->month)->sum('total_price');

        $yearEarnings = Order::where('payment_status', '!=', 'Đã Thanh Toán')
            ->whereYear('created_at', Carbon::now()->year)->sum('total_price');

        $totalusers = User::count();
        $totalproduct = Products::count();

        $mostSoldProducts = DB::table('products')
        ->select('products.name', DB::raw('COUNT(order.id) as total_orders'), DB::raw('COUNT(*) as total_sold'))
        ->join('order', 'products.id', '=', 'order.product_id')
        ->where('order.payment_status', 'Đã Thanh Toán')
        ->groupBy('products.name')
        ->orderByDesc('total_sold')
        ->take(5)
        ->get();

        $categories = DB::table('category')
        ->leftJoin('products', 'category.id', '=', 'products.id_category')
        ->select('category.name', DB::raw('COUNT(products.id) as product_count'))
        ->groupBy('category.id', 'category.name')
        ->get();

        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard', compact('totalPendingOrders','totalproduct','totalusers','categories','totalPaidAmount', 'todaysEarnings', 'monthEarnings', 'yearEarnings', 'mostSoldProducts'));
    }

    public function getEarningsData(Request $request)
    {
        $selectedDate = $request->input('date');

        $month = substr($selectedDate, 0, 2);
        $day= substr($selectedDate, 3, 2);
        $year = substr($selectedDate, 6, 4);

        $todaysEarnings = Order::where('payment_status', 'Đã Thanh Toán')
            ->whereDate('created_at', 'like', $year.'-'.$month.'-'.$day.'%')->sum('total_price');

        $monthEarnings = Order::where('payment_status', '!=' , 'Đã Thanh Toán')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->sum('total_price');

        $yearEarnings = Order::where('payment_status', '!=' , 'Đã Thanh Toán')
            ->whereYear('created_at', $year)
            ->sum('total_price');

        $data = [$todaysEarnings, $monthEarnings, $yearEarnings];

        return response()->json($data);
    }


}
