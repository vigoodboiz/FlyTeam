<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Item;
use App\Models\CartItem;
use App\Http\Controllers\PaymentController;

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

    public function post_checkout($cart_id)
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
            $carts= Cart::where('user_id', $userId)->get();
            foreach ($carts as $cart) {
                $cart->delete();
            }
           return redirect()->back()->with('msg', 'Đặt hàng thành công');



    

    }

//     public function post_checkout_vnpay($cart_id)
// {
//     $userId = Auth::user()->id;
//     $cart = Cart::where('user_id', $userId)->first();

//     $totalQuantity = $cart->sum('quantity');
//     $totalAmount = $cart->sum('total_price');

//     $data = [
//         'cart_id' => $cart_id,
//         'user_id' => Auth::user()->id,
//         'product_id' => $cart->product_id,
//         'quantity' => $totalQuantity,
//         'total_price' => $totalAmount,
//         'payment_status' => 'Đang Xác Nhận',
//         'delivery_status' => 'Đang Xử Lý',
//     ];

//     $order = Order::where(['cart_id' => $cart_id, 'user_id' => Auth::user()->id])->first();

//     if (!$order) {
//         // Tạo đơn hàng mới nếu chưa tồn tại
//         $order = Order::create($data);
//     } else {
//         // Cập nhật thông tin đơn hàng nếu đã tồn tại
//         $order->update($data);
//     }

//     // Xóa giỏ hàng của người dùng
//     $userId = Auth::user()->id;
//     Cart::where('user_id', $userId)->delete();

//     // Chuyển hướng người dùng đến trang thanh toán VNPAY
//     return redirect()->route('vnpay_payment');
// }

//////////////////////////////////// hàm trả về sau khi thanh toán thành công 

    // public function vnpayCheckout(Request $request)
    // {
    //     // Xử lý kết quả thanh toán từ VNPAY
    //     $vnp_ResponseCode = $request->input('vnp_ResponseCode');
    //     $vnp_Message = $request->input('vnp_Message');
    
    //     if ($vnp_ResponseCode == '00') {
    //         // Thanh toán thành công, hiển thị thông báo thành công
    //         return redirect()->back()->with('success', 'Thanh toán thành công');
    //     } else {
    //         // Thanh toán thất bại, hiển thị thông báo lỗi
    //         return redirect()->back()->with('error', 'Thanh toán thất bại: ' . $vnp_Message);
    //     }
    // }

    ////////////////////////////////////////////////////////////////////

//     public function vnpayCheckout(Request $request)
// {
//     // Xử lý kết quả thanh toán từ VNPAY
//     $vnp_ResponseCode = $request->input('vnp_ResponseCode');
//     $vnp_Message = $request->input('vnp_Message');

//     if ($vnp_ResponseCode == '00') {
//         // Thanh toán thành công, lưu đơn hàng và xoá giỏ hàng
//         $userId = Auth::user()->id;
//         $cart = Cart::where('user_id', $userId)->first();

//         $totalQuantity = $cart->sum('quantity');
//         $totalAmount = $cart->sum('total_price');

//         $data = [
//             'cart_id' => $cart_id,
//             'user_id' => Auth::user()->id,
//             'product_id' => $cart->product_id,
//             'quantity' => $totalQuantity,
//             'total_price' => $totalAmount,
//             'payment_status' => 'Đang Xác Nhận',
//             'delivery_status' => 'Đang Xử Lý',
//         ];

//         $order = Order::where(['cart_id' => $cart_id, 'user_id' => Auth::user()->id])->first();

//         if (!$order) {
//             // Tạo đơn hàng mới nếu chưa tồn tại
//             $order = Order::create($data);
//         } else {
//             // Cập nhật thông tin đơn hàng nếu đã tồn tại
//             $order->update($data);
//         }

//         // Xóa giỏ hàng của người dùng
//         Cart::where('user_id', $userId)->delete();

//         return redirect()->back()->with('success', 'Thanh toán thành công');
//     } else {
//         // Thanh toán thất bại, hiển thị thông báo lỗi
//         return redirect()->back()->with('error', 'Thanh toán thất bại: ' . $vnp_Message);
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

//         $vnp_TxnRef = Session::get('cart_id'); // Lấy giá trị $vnp_TxnRef từ session
//         $maxCartIdValue = 99999999999999999999; // Giá trị tối đa cho 'bigint' (20 chữ số)
//         $vnp_TxnRef = intval($vnp_TxnRef);
//         $vnp_TxnRef = min($vnp_TxnRef, $maxCartIdValue);

//         $totalQuantity = $cart->sum('quantity');
//         $totalAmount = $cart->sum('total_price');

//         $data = [
//             'cart_id' => $vnp_TxnRef,
//             'user_id' => Auth::user()->id,
//             'product_id' => $cart->product_id,
//             'quantity' => $totalQuantity,
//             'total_price' => $totalAmount,
//             'payment_status' => 'Đang Xác Nhận',
//             'delivery_status' => 'Đang Xử Lý',
//         ];

//         $order = Order::where(['cart_id' => $vnp_TxnRef, 'user_id' => Auth::user()->id])->first();

//         if (!$order) {
//             // Tạo đơn hàng mới nếu chưa tồn tại
//             $order = Order::create($data);
//         } else {
//             // Cập nhật thông tin đơn hàng nếu đã tồn tại
//             $order->update($data);
//         }

//         // Xóa giỏ hàng của người dùng
//         Cart::where('user_id', $userId)->delete();

//         return redirect()->back()->with('success', 'Thanh toán thành công');
//     } else {
//         // Thanh toán thất bại, hiển thị thông báo lỗi
//         return redirect()->back()->with('error', 'Thanh toán thất bại: ' . $vnp_Message);
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
        
//         $vnp_TxnRef = Session::get('cart_id'); // Lấy giá trị $vnp_TxnRef từ session
//         $maxCartIdValue = 99999999999999999999; // Giá trị tối đa cho 'bigint' (20 chữ số)
//         $vnp_TxnRef = intval($vnp_TxnRef);
//         $vnp_TxnRef = min($vnp_TxnRef, $maxCartIdValue);

//         $totalQuantity = $cart->items->sum('quantity');
//         $totalAmount = $cart->items->sum('total_price');

//         $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);

//         $order->fill([
//             'user_id' => $userId,
//             'quantity' => $totalQuantity,
//             'total_price' => $totalAmount,
//             'payment_status' => 'Đang Xác Nhận',
//             'delivery_status' => 'Đang Xử Lý',
//         ])->save();

//         // Xóa các mục trong giỏ hàng
//         $cart->items()->delete();

//         return redirect()->back()->with('success', 'Thanh toán thành công');
//     } else {
//         // Thanh toán thất bại, hiển thị thông báo lỗi
//         return redirect()->back()->with('error', 'Thanh toán thất bại: ' . $vnp_Message);
//     }
// }
//// load đc 
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
            

//             $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);

//             $order->fill([
//                 'user_id' => $userId,
//                 'quantity' => $totalQuantity,
//                 'total_price' => $totalAmount,
//                 'payment_status' => 'Đang Xác Nhận',
//                 'delivery_status' => 'Đang Xử Lý',
//             ])->save();

//             // Xóa các mục trong giỏ hàng
//             $cart->items()->delete();

//             return redirect()->back()->with('success', 'Thanh toán thành công');
//         } else {
//             return redirect()->back()->with('error', 'Không tìm thấy giỏ hàng');
//         }
//     } else {
//         // Thanh toán thất bại, hiển thị thông báo lỗi
//         return redirect()->back()->with('error', 'Thanh toán thất bại: ' . $vnp_Message);
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

//             $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);

//             $order->fill([
//                 'user_id' => $userId,
//                 'quantity' => $totalQuantity,
//                 'total_price' => $totalAmount,
//                 'payment_status' => 'Đang Xác Nhận',
//                 'delivery_status' => 'Đang Xử Lý',
//             ])->save();

//             // Xóa các mục trong giỏ hàng
//             $cart->items()->delete();

//             return redirect()->back()->with('success', 'Thanh toán thành công');
//         } else {
//             return redirect()->back()->with('error', 'Không tìm thấy giỏ hàng');
//         }
//     } else {
//         // Thanh toán thất bại, hiển thị thông báo lỗi
//         return redirect()->back()->with('error', 'Thanh toán thất bại: ' . $vnp_Message);
//     }
// }


////////////////////// xoá thành côgn //////////////////////
// public function vnpayCheckout(Request $request)
// {
//     // Xử lý kết quả thanh toán từ VNPAY
//     $vnp_ResponseCode = $request->input('vnp_ResponseCode');
//     $vnp_Message = $request->input('vnp_Message');

//     if ($vnp_ResponseCode == '00') {
//         // Thanh toán thành công, lưu đơn hàng và xoá giỏ hàng
//         $userId = Auth::user()->id;
//         $cart = Cart::where('user_id', $userId)->first();
//         // $cart = Cart::where('user_id', $userId)->first();

//         if ($cart) {
//             $vnp_TxnRef = Session::get('cart_id'); // Lấy giá trị $vnp_TxnRef từ session
//             $maxCartIdValue = 99999999999999999999; // Giá trị tối đa cho 'bigint' (20 chữ số)
//             $vnp_TxnRef = intval($vnp_TxnRef);
//             $vnp_TxnRef = min($vnp_TxnRef, $maxCartIdValue);
        
//             $totalQuantity = $cart->sum('quantity');
//             $totalAmount = $cart->sum('total_price');
        
//             $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);
        
//             $order->fill([
//                 'user_id' => $userId,
//                 'quantity' => $totalQuantity,
//                 'total_price' => $totalAmount,
//                 'payment_status' => 'Đang Xác Nhận',
//                 'delivery_status' => 'Đang Xử Lý',
//             ])->save();
        
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
//////////////////////////  lưu được giỏ hàng //////////////////////////////////////

public function vnpayCheckout(Request $request)
{
    // Xử lý kết quả thanh toán từ VNPAY
    $vnp_ResponseCode = $request->input('vnp_ResponseCode');
    $vnp_Message = $request->input('vnp_Message');

    if ($vnp_ResponseCode == '00') {
        // Thanh toán thành công, lưu đơn hàng và xoá giỏ hàng
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->first();

        if ($cart) {
            $vnp_TxnRef = Session::get('cart_id'); // Lấy giá trị $vnp_TxnRef từ session
            $maxCartIdValue = 99999999999999999999; // Giá trị tối đa cho 'bigint' (20 chữ số)
            $vnp_TxnRef = intval($vnp_TxnRef);
            $vnp_TxnRef = min($vnp_TxnRef, $maxCartIdValue);

            $totalQuantity = $cart->sum('quantity');
            $totalAmount = $cart->sum('total_price');

            $data = [
                'cart_id' => $vnp_TxnRef,
                'user_id' => $userId,
                'product_id' => $cart->product_id,
                'quantity' => $totalQuantity,
                'total_price' => $totalAmount,
                'payment_status' => 'Đang Xác Nhận',
                'delivery_status' => 'Đang Xử Lý',
            ];

            $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);
            $order->fill($data)->save();

            // Kiểm tra xem giỏ hàng có các mục giỏ hàng không
            if ($cart->Items) {
                foreach ($cart->Items as $Items) {
                    $Items->delete();
                }
            }

            // Xóa giỏ hàng
            $cart->delete();
            return redirect()->back()->with('success', 'Thanh toán thành công');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy giỏ hàng');
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
//             $vnp_TxnRef = Session::get('cart_id'); // Lấy giá trị $vnp_TxnRef từ session
//             $maxCartIdValue = 99999999999999999999; // Giá trị tối đa cho 'bigint' (20 chữ số)
//             $vnp_TxnRef = intval($vnp_TxnRef);
//             $vnp_TxnRef = min($vnp_TxnRef, $maxCartIdValue);

//             $items = $cart->items;
//             $totalQuantity = 0;
//             $totalAmount = 0;

//             foreach ($items as $item) {
//                 $totalQuantity += $item->quantity;
//                 $totalAmount += $item->total_price;
//             }

//             $data = [
//                 'cart_id' => $vnp_TxnRef,
//                 'user_id' => $userId,
//                 'total_quantity' => $totalQuantity,
//                 'total_amount' => $totalAmount,
//                 'payment_status' => 'Đang Xác Nhận',
//                 'delivery_status' => 'Đang Xử Lý',
//             ];

//             $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);
//             $order->fill($data)->save();

//             // Xóa giỏ hàng và các mục giỏ hàng
//             $cart->items()->delete();
//             $cart->delete();

//             return redirect()->back()->with('success', 'Thanh toán thành công');
//         } else {
//             return redirect()->back()->with('error', 'Không tìm thấy giỏ hàng');
//         }
//     }
// }
////////////////////////////////////////////////////////////////
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

//             $totalQuantity = $cart->items()->sum('quantity');
//             $totalAmount = $cart->items()->sum('total_price');

//             $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);
//             $order->fill([

//                 'user_id' => $userId,
//                 'quantity' => $totalQuantity,
//                 'total_price' => $totalAmount,
//                 'payment_status' => 'Đang Xác Nhận',
//                 'delivery_status' => 'Đang Xử Lý',
//             ]);

//             // Lưu đơn hàng trước khi xoá giỏ hàng
//             $order->save();

//             // Xóa các mục trong giỏ hàng
//             $cart->items()->delete();

//             return redirect()->back()->with('success', 'Thanh toán thành công');
//         } else {
//             return redirect()->back()->with('error', 'Không tìm thấy giỏ hàng');
//         }
//     } else {
//         // Thanh toán thất bại, hiển thị thông báo lỗi
//         return redirect()->back()->with('error', 'Thanh toán thất bại: ' . $vnp_Message);
//     }
// }

// public function vnpayCheckout(Request $request)
// {
//     // Xử lý kết quả thanh toán từ VNPAY
//     $vnp_ResponseCode = $request->input('vnp_ResponseCode');
//     $vnp_Message = $request->input('vnp_Message');

//     if ($vnp_ResponseCode == '00') {
//         // Thanh toán thành công, lưu đơn hàng và các mục hàng
//         $userId = Auth::user()->id;
//         $cart = Cart::where('user_id', $userId)->first();

//         if ($cart) {
//             $vnp_TxnRef = Session::get('cart_id'); // Lấy giá trị $vnp_TxnRef từ session
//             $maxCartIdValue = 99999999999999999999; // Giá trị tối đa cho 'bigint' (20 chữ số)
//             $vnp_TxnRef = intval($vnp_TxnRef);
//             $vnp_TxnRef = min($vnp_TxnRef, $maxCartIdValue);

//             $totalQuantity = $cart->items()->sum('quantity');
//             $totalAmount = $cart->items()->sum('total_price');

//             $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);
//             $order->fill([
//                 'user_id' => $userId,
//                 'quantity' => $totalQuantity,
//                 'total_price' => $totalAmount,
//                 'payment_status' => 'Đang Xác Nhận',
//                 'delivery_status' => 'Đang Xử Lý',
//             ]);

//             // Lưu đơn hàng trước khi xoá giỏ hàng
//             $order->save();

//             // Lưu các mục hàng vào bảng 'items'
//             $itemsData = [];
//             foreach ($cart->items as $item) {
//                 $itemsData[] = [
//                     'cart_id' => $vnp_TxnRef,
//                     'quantity' => $item->quantity,
//                     'total_price' => $item->total_price,
//                 ];
//             }
//             item::insert($itemsData);

//             // Xóa các mục trong giỏ hàng
//             $cart->items()->delete();

//             return redirect()->back()->with('success', 'Thanh toán thành công');
//         } else {
//             return redirect()->back()->with('error', 'Không tìm thấy giỏ hàng');
//         }
//     } else {
//         // Thanh toán thất bại, hiển thị thông báo lỗi
//         return redirect()->back()->with('error', 'Thanh toán thất bại: ' . $vnp_Message);
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

//         if ($cart && $cart->items()->exists()) {
//             $vnp_TxnRef = Session::get('cart_id'); // Lấy giá trị $vnp_TxnRef từ session
//             $maxCartIdValue = 99999999999999999999; // Giá trị tối đa cho 'bigint' (20 chữ số)
//             $vnp_TxnRef = intval($vnp_TxnRef);
//             $vnp_TxnRef = min($vnp_TxnRef, $maxCartIdValue);

//             $totalQuantity = $cart->items()->sum('quantity');
//             $totalAmount = $cart->items()->sum('total_price');

//             $order = Order::firstOrNew(['cart_id' => $vnp_TxnRef, 'user_id' => $userId]);

//             $order->fill([
//                 'user_id' => $userId,
//                 'quantity' => $totalQuantity,
//                 'total_price' => $totalAmount,
//                 'payment_status' => 'Đang Xác Nhận',
//                 'delivery_status' => 'Đang Xử Lý',
//             ])->save();

//             // Xóa các mục trong giỏ hàng
//             $cart->items()->delete();

//             return redirect()->back()->with('success', 'Thanh toán thành công');
//         } else {
//             return redirect()->back()->with('error', 'Giỏ hàng trống');
//         }
//     } else {
//         // Thanh toán thất bại, hiển thị thông báo lỗi
//         return redirect()->back()->with('error', 'Thanh toán thất bại: ' . $vnp_Message);
//     }
// }

}
