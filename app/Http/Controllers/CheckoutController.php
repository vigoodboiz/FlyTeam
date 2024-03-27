<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
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
        if ($cartItems->isEmpty()) {
            return redirect()->route('shopGrid')->with('error', 'Bạn không có sản phẩm nào cả - Vui lòng thêm sản phẩm vào giỏ hàng!');
        } else {
            $totalPrice = $this->calculateTotalPrice();

            return view('page.checkout', compact('cartItems', 'totalPrice'));
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
        $note = $request->input('note') ?? '';

        if (!$cart) {
            return redirect()->route('shopGrid')->with('error', 'Bạn không có đơn hàng nào cả!');
        } else {
            foreach ($cart as $cartItem) {
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

                $product = Products::find($cartItem->product_id);
                $product->decrement('quantity_product', $cartItem->quantity);

                $usedCouponId = $request->input('coupon');

                $coupon = Coupon::find($usedCouponId);
                if ($coupon) {
                    $coupon->coupon_time--;
                    $coupon->save();
                }

                Session::start();
                Session::forget('coupon');
            }

            $userId = auth::user()->id;
            $userMail = auth::user()->email;
            $userName = auth::user()->name;
            $carts = Cart::where('user_id', $userId)->get();
            $Mail = Mail::to($userMail)->send(new TestMail($userName));
            $carts = Cart::where('user_id', $userId)->get();
            foreach ($carts as $cart) {
                $cart->delete();
            }
            return redirect()->route('history')->with('success', 'Đặt hàng thành công!');
        }
    }


    public function vnpayCheckout(Request $request)
    {
        // Xử lý kết quả thanh toán từ VNPAY
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_Message = $request->input('vnp_Message');

        if ($vnp_ResponseCode == '00') {
            // Thanh toán thành công, lưu đơn hàng và xoá giỏ hàng
            $userId = Auth::user()->id;
            $cart = Cart::where('user_id', $userId)->get();
            $note = $request->input('note') ?? '';

            if ($cart->isNotEmpty()) {
                foreach ($cart as $cartItem) {
                    $order = new Order();
                    $order->cart_id = $cartItem->id;
                    $order->user_id = Auth::user()->id;
                    $order->product_id = $cartItem->product_id;
                    $order->quantity = $cartItem->quantity;
                    $order->total_price = $cartItem->total_price;
                    $order->note = $note;
                    $order->payment_status = 'Đã Thanh Toán';
                    $order->delivery_status = 'Đang xử lý';
                    $order->save();


                    $product = Products::find($cartItem->product_id);
                    $product->decrement('quantity_product', $cartItem->quantity);

                    Coupon::decrement('coupon_time', 1);

                    Session::start();
                    Session::forget('coupon');
                }

                // Xóa giỏ hàng
                $carts = Cart::where('user_id', $userId)->get();
                foreach ($carts as $cart) {
                    $cart->delete();
                }

                return redirect()->route('history')->with('success', 'Thanh toán thành công');
            } else {
                return redirect()->route('shopGrid')->with('error', 'Không tìm thấy giỏ hàng');
            }
        } else {
            return redirect()->route('shopGrid')->with('error', 'Thanh toán thất bại');
        }
    }


    public function momoCheckout(Request $request)
    {
        // Xử lý kết quả thanh toán từ MoMo
        $status = $request->input('status');
        $message = $request->input('message');
        $errorCode = $request->input('errorCode');
        $localMessage = $request->input('localMessage');

        if ($status == '0') {
            return redirect()->route('shopGrid')->with('error', 'Thanh toán thất bại');
        } else {


            // Thanh toán thành công, lưu đơn hàng và xoá giỏ hàng
            $userId = Auth::user()->id;
            $cart = Cart::where('user_id', $userId)->get();

            $orderInfo = $request->session()->get('orderInfo');
            $amount = $request->session()->get('amount');
            $orderId = $request->session()->get('orderId');
            $extraData = $request->session()->get('extraData');
            $note = $request->input('note') ?? '';

            if ($cart->isNotEmpty()) {
                foreach ($cart as $cartItem) {
                    $order = new Order();
                    $order->cart_id = $cartItem->id;
                    $order->user_id = Auth::user()->id;
                    $order->product_id = $cartItem->product_id;
                    $order->quantity = $cartItem->quantity;
                    $order->total_price = $cartItem->total_price;
                    $order->note = $note;
                    $order->payment_status = 'Đã Thanh Toán';
                    $order->delivery_status = 'Đang xử lý';
                    $order->save();

                    $product = Products::find($cartItem->product_id);
                    $product->decrement('quantity_product', $cartItem->quantity);

                    Coupon::decrement('coupon_time', 1);


                    Session::start();
                    Session::forget('coupon');
                }

                // Xóa giỏ hàng
                $carts = Cart::where('user_id', $userId)->get();
                foreach ($carts as $cart) {
                    $cart->delete();
                }

                // Thực hiện các chức năng khác của thanh toán online ở đây
                // ...

                return redirect()->route('history')->with('success', 'Thanh toán thành công');
            } else {
                return redirect()->route('shopGrid')->with('error', 'Không tìm thấy giỏ hàng');
            }
        }
    }


    public function cancel(Order $order)
    {
        if ($order->payment_status !== 'Đã xác nhận') {
        $order->payment_status = 'Đã hủy đơn hàng';
        $order->delivery_status = 'Không thể xử lí giao hàng';
        $order->reason = request()->input('reason');
        $order->save();
        return redirect()->route('canceled')->with('success', 'Đơn đặt hàng đã được hủy thành công!');
        } else {
            $order->payment_status = 'Đã xác nhận';
            $order->delivery_status = 'Đang xử lý';
            $order->save(); 
            return redirect()->route('confirmed')->with('error', 'Đơn hàng của bạn đã được xác nhận - Bạn không thể hủy đơn hàng!');
        }
    }

    public function showReorderForm($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.reorder', ['order' => $order]);
    }
    public function reorder($id)
    {
        $order = Order::findOrFail($id);
            // Tái tạo lại đơn hàng
            if($order->payment_status = 'Đã hủy đơn hàng' && $order->delivery_status = 'Không thể xử lí giao hàng'){
            $newOrder = $order->replicate();
            $newOrder->payment_status = 'Đang xác nhận';
            $newOrder->delivery_status = 'Đang xử lý';
            $newOrder->save();
            // Xóa đơn hàng đã bị hủy đi
            $order->delete();
            return redirect()->route('history', $newOrder->id)->with('success', 'Đơn đặt hàng đã được mua lại thành công!');
            } else {
                return redirect()->back()->with('error', 'Không thể mua lại đơn hàng đã được xác nhận hoặc đang giao.');
            }
    }
}