<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Products;

class HistoryController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', auth()->id())->with('product')->paginate(10);
        if($orders){
        return view('page.history', compact('orders'));
        } else {
            return redirect()->back()->with('error', 'Orders do not exist');
        }
    }
}