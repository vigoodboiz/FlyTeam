<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Mail;

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

    public function post_checkout()
    {
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->get();

        foreach($cart as $cartItem){
            $order = new Order();
            $order->cart_id = $cartItem->id;
            $order->user_id = Auth::user()->id;
            $order->product_id = $cartItem->product_id;
            $order->quantity = $cartItem->quantity;
            $order->total_price = $cartItem->total_price;
            $order->payment_status = 'Đang Xác Nhận';
            $order->delivery_status = 'Đang Xử Lý';
            $order->save();
        }
        
            $userId = auth::user()->id;
            $carts= Cart::where('user_id', $userId)->get();
            foreach ($carts as $cart) {
                $cart->delete();
            }

           return redirect()->back()->with('success', 'Order successfully!');


    }
    
    
}