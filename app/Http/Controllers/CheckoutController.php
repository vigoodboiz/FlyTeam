<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Mail;

class CheckoutController extends Controller
{
    //
    public function index(){
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
    public function post_checkout($cart_id){
        $cartItems = Cart::all();

        $totalQuantity = $cartItems->sum('quantity');
        $totalAmount = $cartItems->sum('total_price');
              
        $data = [
            'cart_id' => $cart_id,
            'user_id' => Auth::user()->id,
            'quantity' => $totalQuantity,
            'total_price' => $totalAmount,
            'payment_status' => 'Chờ xác nhận',
        ];
        $orderd = Order::where(['cart_id' => $cart_id, 'user_id' => Auth::user()->id])->first();
            Order::create($data);
            $userId = auth::user()->id;
            $carts= Cart::where('user_id', $userId)->get();
            foreach ($carts as $cart) {
                $cart->delete();
            }
           return redirect()->back()->with('msg', 'Đặt hàng thành công');
    }
}