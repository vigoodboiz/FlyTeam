<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\Coupon;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalPrice = $this->calculateTotalPrice();

        return view('page.checkout' , compact('cartItems','totalPrice'));

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

    public function post_checkout($cart_id, Request $request)
    {
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->first();
        $totalQuantity = $cart->sum('quantity');
        $totalAmount = $cart->sum('total_price');
        
        $data = [
            'cart_id' => $cart_id,
            'user_id' => Auth::user()->id,
            'product_id' => $cart->product_id,
            'quantity' => $totalQuantity,
            'total_price' => $totalAmount,
            'payment_status' => 'Đang Xác Nhận',
            'delivery_status' => 'Đang Xử Lý',
        ];

        $orderd = Order::where(['cart_id' => $cart_id, 'user_id' => Auth::user()->id])->first();
            Order::create($data);
            $userId = auth::user()->id;
            $userMail = auth::user()->email;
            $userName = auth::user()->name;
            $carts= Cart::where('user_id', $userId)->get();
            $Mail = Mail::to($userMail)->send(new TestMail($userName));
            foreach ($carts as $cart) {
                $cart->delete();
            }
           return redirect()->back()->with('msg', 'Đặt hàng thành công');

        
    }
}
