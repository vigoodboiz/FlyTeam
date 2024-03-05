<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Mail;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalPrice = $this->calculateTotalPrice();
        $orders = Order::where('user_id', $userId)->get();
        return view('page.checkout', compact('cartItems', 'totalPrice', 'orders'));
    }

    public function calculateTotalPrice()
    {

        $userId = Auth::user()->id;
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->total_price;
        }
        return $totalPrice;
    }
    public function post_checkout($cart_id)
    {
        
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->first();
        // $cart_id = $cart->id;
        $data = [
            'cart_id' => $cart_id,
            'user_id' => Auth::user()->id,
            'product_id' => $cart->product_id,
            'payment_status' => 'Đang Xác Nhận',
            'delivery_status' => 'Đang Xử Lý',
        ];

        $order = Order::where(['cart_id' => $cart_id, 'user_id' => Auth::user()->id])->first();

        if (!$order) {
            $order = Order::create($data);
        }

        $cart->delete();

        return redirect()->back()->with('msg', 'Đặt hàng thành công');
    }
}
