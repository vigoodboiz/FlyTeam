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
        if($cartItems->isEmpty()) {
            return redirect()->route('shopGrid')->with('error', 'Bạn không có sản phẩm nào cả - Vui lòng thêm sản phẩm vào giỏ hàng!');
        } else {
           $totalPrice = $this->calculateTotalPrice();

            return view('page.checkout' , compact('cartItems','totalPrice'));
       }
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

    public function post_checkout(Request $request)
    {
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->get();
        $note = $request->input('note');
        if($cart->isEmpty()) {
                return redirect()->route('shopGrid')->with('error', 'Bạn không có đơn hàng cần thanh toán nào cả!');
        } else{
            foreach($cart as $cartItem){
                $order = new Order();
                $order->cart_id = $cartItem->id;
                $order->user_id = Auth::user()->id;
                $order->product_id = $cartItem->product_id;
                $order->quantity = $cartItem->quantity;
                $order->total_price = $cartItem->total_price;
                $order->note = $note;
                $order->payment_status = 'Đang xác nhận';
                $order->delivery_status = 'Đang xử lý';
                $order->save();
            }
            
                $userId = auth::user()->id;
                $carts= Cart::where('user_id', $userId)->get();
                foreach ($carts as $cart) {
                    $cart->delete();
                }
    
               return redirect()->route('history')->with('success', 'Đặt hàng thành công!');
        }

    }
    public function cancel(Order $order)
{
    $order->payment_status = 'Đã hủy đơn hàng';
    $order->delivery_status = 'Không thể xử lý giao hàng';
    $order->save();
    return redirect()->back()->with('success', 'Đơn đặt hàng đã bị hủy thành công!');
}
public function showReorderForm($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.reorder', ['order' => $order]);
    }
public function reorder($id)
{
        $order = Order::findOrFail($id);
        if (!$order) {
            return redirect()->route('home')->with('error', 'Đơn hàng không tồn tại!');
        }
        // Tái tạo lại đơn hàng
        $newOrder = $order->replicate();
        $newOrder->payment_status = 'Đang xác nhận';
        $newOrder->delivery_status = 'Đang xử lý';
        $newOrder->save();
        // Xóa đơn hàng đã bị hủy đi
        $order->delete();
        return redirect()->route('history', $newOrder->id)->with('success', 'Đơn đặt hàng đã được mua lại thành công!');
}
}