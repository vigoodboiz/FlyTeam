<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Products;

class HistoryController extends Controller
{
    public function index()
    {
        $historyCount = Order::where('payment_status', 'Đang xác nhận')
            ->where('delivery_status', 'Đang xử lý')
            ->where('user_id', auth()->id())
            ->count();
        $confirmedCount = Order::where('payment_status', 'Đã xác nhận')
            ->where('user_id', auth()->id())
            ->count();
        $deliveryCount = Order::where('delivery_status', 'Đang giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $canceledCount = Order::where('payment_status', 'Đã hủy đơn hàng')
            ->where('delivery_status', 'Không thể xử lí giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $successCount = Order::where('delivery_status', 'Đã giao hàng')
            ->where('payment_status', 'Đã thanh toán')
            ->where('user_id', auth()->id())
            ->count();
        $orders = Order::where('user_id', auth()->id())
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->get();
        if ($orders) {
            return view('page.history', compact('orders', 'historyCount', 'confirmedCount', 'deliveryCount', 'canceledCount', 'successCount'));
        } else {
            return redirect()->back()->with('error', 'Đơn đặt hàng không tồn tại!');
        }
    }

    public function confirmed()
    {
        $historyCount = Order::where('payment_status', 'Đang xác nhận')
            ->where('delivery_status', 'Đang xử lý')
            ->where('user_id', auth()->id())
            ->count();
        $confirmedCount = Order::where('payment_status', 'Đã xác nhận')
            ->where('user_id', auth()->id())
            ->count();
        $deliveryCount = Order::where('delivery_status', 'Đang giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $canceledCount = Order::where('payment_status', 'Đã hủy đơn hàng')
            ->where('delivery_status', 'Không thể xử lí giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $successCount = Order::where('delivery_status', 'Đã giao hàng')
            ->where('payment_status', 'Đã thanh toán')
            ->where('user_id', auth()->id())
            ->count();
        $orders = Order::where('user_id', auth()->id())
            ->with('product')
            ->orderBy('created_at', 'desc')->get();
        return view('page.confirmed', compact('orders', 'historyCount', 'confirmedCount', 'deliveryCount', 'canceledCount', 'successCount'));
    }
    public function delivery()
    {
        $historyCount = Order::where('payment_status', 'Đang xác nhận')
            ->where('delivery_status', 'Đang xử lý')
            ->where('user_id', auth()->id())
            ->count();
        $confirmedCount = Order::where('payment_status', 'Đã xác nhận')
            ->where('user_id', auth()->id())
            ->count();
        $deliveryCount = Order::where('delivery_status', 'Đang giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $canceledCount = Order::where('payment_status', 'Đã hủy đơn hàng')
            ->where('delivery_status', 'Không thể xử lí giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $successCount = Order::where('delivery_status', 'Đã giao hàng')
            ->where('payment_status', 'Đã thanh toán')
            ->where('user_id', auth()->id())
            ->count();
        $orders = Order::where('user_id', auth()->id())
            ->with('product')
            ->orderBy('created_at', 'desc')->get();
        return view('page.delivery', compact('orders', 'historyCount', 'confirmedCount', 'deliveryCount', 'canceledCount', 'successCount'));
    }
    public function canceled()
    {
        $historyCount = Order::where('payment_status', 'Đang xác nhận')
            ->where('delivery_status', 'Đang xử lý')
            ->where('user_id', auth()->id())
            ->count();
        $confirmedCount = Order::where('payment_status', 'Đã xác nhận')
            ->where('user_id', auth()->id())
            ->count();
        $deliveryCount = Order::where('delivery_status', 'Đang giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $canceledCount = Order::where('payment_status', 'Đã hủy đơn hàng')
            ->where('delivery_status', 'Không thể xử lí giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $successCount = Order::where('delivery_status', 'Đã giao hàng')
            ->where('payment_status', 'Đã thanh toán')
            ->where('user_id', auth()->id())
            ->count();
        $orders = Order::where('user_id', auth()->id())
            ->with('product')
            ->orderBy('created_at', 'desc')->get();
        return view('page.canceled', compact('orders', 'historyCount', 'confirmedCount', 'deliveryCount', 'canceledCount', 'successCount'));
    }
    public function success()
    {
        $historyCount = Order::where('payment_status', 'Đang xác nhận')
            ->where('delivery_status', 'Đang xử lý')
            ->where('user_id', auth()->id())
            ->count();
        $confirmedCount = Order::where('payment_status', 'Đã xác nhận')
            ->where('user_id', auth()->id())
            ->count();
        $deliveryCount = Order::where('delivery_status', 'Đang giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $canceledCount = Order::where('payment_status', 'Đã hủy đơn hàng')
            ->where('delivery_status', 'Không thể xử lí giao hàng')
            ->where('user_id', auth()->id())
            ->count();
        $successCount = Order::where('delivery_status', 'Đã giao hàng')
            ->where('payment_status', 'Đã thanh toán')
            ->where('user_id', auth()->id())
            ->count();
        $orders = Order::where('user_id', auth()->id())
            ->with('product')
            ->orderBy('created_at', 'desc')->get();
        return view('page.success', compact('orders', 'historyCount', 'confirmedCount', 'deliveryCount', 'canceledCount', 'successCount'));
    }
}
