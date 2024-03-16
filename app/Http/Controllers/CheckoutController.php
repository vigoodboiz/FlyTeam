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
use Illuminate\Support\Facades\Session;
use App\Models\Item;
use App\Models\CartItem;
use App\Http\Controllers\PaymentController;



// use PayPal\Api\Payment;
// use PayPal\Api\PaymentExecution;
// use PayPal\Auth\OAuthTokenCredential;
// use PayPal\Rest\ApiContext;
// use Mail;

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
        if(!$cart) {
                return redirect()->route('shopGrid')->with('error', 'Bạn không có đơn hàng nào cả!');
        } else{
            foreach($cart as $cartItem){
                $order = new Order();
                $order->cart_id = $cartItem->id;
                $order->user_id = Auth::user()->id;
                $order->product_id = $cartItem->product_id;
                $order->quantity = $cartItem->quantity;
                $order->total_price = $cartItem->total_price;
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
    

    public function vnpayCheckout(Request $request)
    {
        // Xử lý kết quả thanh toán từ VNPAY
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_Message = $request->input('vnp_Message');
    
        if ($vnp_ResponseCode == '00') {
            // Thanh toán thành công, lưu đơn hàng và xoá giỏ hàng
            $userId = Auth::user()->id;
            $cart = Cart::where('user_id', $userId)->get();
    
            if ($cart->isNotEmpty()) {
                foreach ($cart as $cartItem) {
                    $order = new Order();
                    $order->cart_id = $cartItem->id;
                    $order->user_id = Auth::user()->id;
                    $order->product_id = $cartItem->product_id;
                    $order->quantity = $cartItem->quantity;
                    $order->total_price = $cartItem->total_price;
                    $order->payment_status = 'Đã Thanh Toán';
                    $order->delivery_status = 'Đang xử lý';
                    $order->save();
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

            if ($cart->isNotEmpty()) {
                foreach ($cart as $cartItem) {
                    $order = new Order();
                    $order->cart_id = $cartItem->id;
                    $order->user_id = Auth::user()->id;
                    $order->product_id = $cartItem->product_id;
                    $order->quantity = $cartItem->quantity;
                    $order->total_price = $cartItem->total_price;
                    $order->payment_status = 'Đã Thanh Toán';
                    $order->delivery_status = 'Đang xử lý';
                    $order->save();
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
    // public function vnpayCheckout(Request $request)
    // {
    //     // Xử lý kết quả thanh toán từ VNPAY
    //     $vnp_ResponseCode = $request->input('vnp_ResponseCode');
    //     $vnp_Message = $request->input('vnp_Message');
    
    //     if ($vnp_ResponseCode == '00') {
    //         // Thanh toán thành công, lưu đơn hàng và xoá giỏ hàng
    //         $userId = Auth::user()->id;
    //         $cart = Cart::where('user_id', $userId)->first();
    
    //         if ($cart) {
    //             foreach ($cart->items as $cartItem) {
    //                 $product = Product::find($cartItem->product_id);
    
    //                 $order = new Order();
    //                 $order->cart_id = $cartItem->id;
    //                 $order->user_id = $userId;
    //                 $order->product_id = $cartItem->product_id;
    //                 $order->product_name = $product->name;
    //                 $order->quantity = $cartItem->quantity;
    //                 $order->total_price = $cartItem->total_price;
    //                 $order->payment_status = 'Đang xác nhận';
    //                 $order->delivery_status = 'Đang xử lý';
    //                 $order->save();
    //             }
    
    //             foreach ($cart->items as $cartItem) {
    //                 $cartItem->delete();
    //             }
    
    //             $cart->delete();
    
    //             return redirect()->route('shopGrid')->with('success', 'Đặt hàng thành công!');
    //         } else {
    //             return redirect()->route('shopGrid')->with('error', 'Không tìm thấy giỏ hàng!');
    //         }
    //     }
    // }
    // public function vnpayCheckout(Request $request)
    // {
    //     // Xử lý kết quả thanh toán từ VNPAY
    //     $vnp_ResponseCode = $request->input('vnp_ResponseCode');
    //     $vnp_Message = $request->input('vnp_Message');
    
    //     if ($vnp_ResponseCode == '00') {
    //         // Thanh toán thành công, lưu đơn hàng và xoá giỏ hàng
    //         $userId = Auth::user()->id;
    //         $cart = Cart::where('user_id', $userId)->first();
    
    //         if ($cart) {
    //             $vnp_TxnRef = Session::get('cart_id'); // Lấy giá trị $vnp_TxnRef từ session
    //             $maxCartIdValue = 99999999999999999999; // Giá trị tối đa cho 'bigint' (20 chữ số)
    //             $vnp_TxnRef = intval($vnp_TxnRef);
    //             $vnp_TxnRef = min($vnp_TxnRef, $maxCartIdValue);
    
    //             $totalQuantity = $cart->sum('quantity');
    //             $totalAmount = $cart->sum('total_price');
    
    //             $data = [
    //                 'cart_id' => $vnp_TxnRef,
    //                 'user_id' => $userId,
    //                 'product_id' => $cart->product_id,
    //                 'quantity' => $totalQuantity,
    //                 'total_price' => $totalAmount,
    //                 'payment_status' => 'Đang Xác Nhận',
    //                 'delivery_status' => 'Đang Xử Lý',
    //                 'deleted_at'=>'xao',
    //             ];
    
    //             $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);
    //             $order->fill($data)->save();
    
    //             // Kiểm tra xem giỏ hàng có các mục giỏ hàng không
    //             if ($cart->Items) {
    //                 foreach ($cart->Items as $Items) {
    //                     $Items->delete();
    //                 }
    //             }
    
    //             // Xóa giỏ hàng
    //             $cart->delete();
    //             return redirect()->back()->with('success', 'Thanh toán thành công');
    //         } else {
    //             return redirect()->back()->with('error', 'Không tìm thấy giỏ hàng');
    //         }
    //     }
    // }
//////////////////////////////////////// paypal ////////////////////////////////
    // public function cancel(Order $order)
    // {
    //     $order->payment_status = 'Đã hủy đơn hàng';
    //     $order->delivery_status = 'Không thể xử lý giao hàng';
    //     $order->save();
    //     return redirect()->back()->with('success', 'Đơn đặt hàng đã bị hủy thành công!');
    // }
    
    // public function showReorderForm($id)
    //     {
    //         $order = Order::findOrFail($id);
    //         return view('orders.reorder', ['order' => $order]);
    //     }
    // public function reorder($id)
    // {
    //         $order = Order::findOrFail($id);
    //         if (!$order) {
    //             return redirect()->route('home')->with('error', 'Đơn hàng không tồn tại!');
    //         }
    //         // Tái tạo lại đơn hàng
    //         $newOrder = $order->replicate();
    //         $newOrder->payment_status = 'Đang xác nhận';
    //         $newOrder->delivery_status = 'Đang xử lý';
    //         $newOrder->save();
    //         // Xóa đơn hàng đã bị hủy đi
    //         $order->delete();
    //         return redirect()->route('history', $newOrder->id)->with('success', 'Đơn đặt hàng đã được mua lại thành công!');
    // }

    // protected $apiContext;

    // public function __construct()
    // {
    //     // Khởi tạo API Context của PayPal
    //     $paypalConfig = config('paypal');
    //     $this->apiContext = new ApiContext(
    //         new OAuthTokenCredential(
    //             $paypalConfig['client_id'],
    //             $paypalConfig['secret']
    //         )
    //     );
    //     $this->apiContext->setConfig($paypalConfig['settings']);
    // }

    // public function executePayment(Request $request)
    // {
    //     // Lấy thông tin từ request để xác nhận thanh toán
    //     $paymentId = $request->input('paymentId');
    //     $payerId = $request->input('PayerID');

    //     // Thực hiện thanh toán trên PayPal
    //     try {
    //         $payment = Payment::get($paymentId, $this->apiContext);

    //         $execution = new PaymentExecution();
    //         $execution->setPayerId($payerId);

    //         $result = $payment->execute($execution, $this->apiContext);

    //         // Xử lý kết quả thanh toán
    //         if ($result->getState() == 'approved') {
    //             // Thanh toán thành công
    //             // ...
    //             return redirect()->route('history')->with('success', 'Thanh toán thành công');
    //         } else {
    //             // Thanh toán thất bại
    //             // ...
    //             return redirect()->route('shopGrid')->with('error', 'Thanh toán PayPal không thành công');
    //         }
    //     } catch (\Exception $e) {
    //         return redirect()->route('shopGrid')->with('error', 'Lỗi thanh toán PayPal: ' . $e->getMessage());
    //     }
    // }

    // public function cancelPayment()
    // {
    //     // Xử lý khi người dùng hủy thanh toán
    //     // ...
    //     return redirect()->route('shopGrid')->with('error', 'Thanh toán PayPal đã bị hủy');
    // }

}

