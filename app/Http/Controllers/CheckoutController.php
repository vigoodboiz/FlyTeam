<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function index(){
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalPrice = $this->calculateTotalPrice();
        return view('page.checkout' , compact('cartItems','totalPrice') );
    }

        // Kiểm tra trạng thái đơn hàng từ session
        // $orderStatus = session('order_status');

        // // Kiểm tra nếu đơn hàng đã được thanh toán thành công
        // if ($orderStatus === 'completed') {
        //     // Xoá dữ liệu đơn hàng từ session
        //     session()->forget('order_status');
        //     // Xoá các dữ liệu khác trên trang checkout
        //     // ...

        //     // Chuyển hướng đến trang khác
        //     return redirect()->to('http://127.0.0.1:8000/page/account');
        // }

    public function calculateTotalPrice()
    {
      
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->total_price;
        }

        return $totalPrice;
    }
}
