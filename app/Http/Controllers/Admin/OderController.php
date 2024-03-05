<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Products;

class OderController extends Controller
{
    public function listOder(){
        $orders = Order::query()->with('product')->get();
        return view('admin.oder.list', compact('orders'));
    }
}