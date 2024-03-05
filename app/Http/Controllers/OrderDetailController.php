<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OderDetail;
use App\Models\Products;
use App\Models\User;

class OrderDetailController extends Controller
{
    public function index($order_id){
        $orders = Order::with('product')->find($order_id)->get();
        return view('page.orderDetail', compact('orders'));
    }
}