<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Exception;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function check_coupon(Request $request)
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $today)->first();

        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session == true) {
                    $is_avaiable = 0;
                    if ($is_avaiable == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,

                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('success', 'Khuyễn mại được thêm thành công!');
            }
        } else {
            return redirect()->back()->with('error', 'Mã giảm giá không chính xác hoặc đã hết hạn!');
        }
    }
    public function index()
    {
        try {
            $userId = Auth::id();
            $cartItems = Cart::where('user_id', $userId)->get();

            $totalPrice = $this->calculateTotalPrice();
            return view('page.cart', compact('cartItems', 'totalPrice'));
        } catch (Exception $exception) {
            Log::error('CartController: ', [$exception->getMessage()]);
            return back()->with([
                'error' => 'Đã có lỗi nghiêm trọng xảy ra'
            ]);
        }
    }

    public function store(Request $request, string $id)
    {
        try {
            $product = Products::query()->find($id);
            $userId = auth()->user()->id;

            // Kiểm tra xem sản phẩm đã tồn tại chưa
            $cartItem = Cart::where('user_id', $userId)
                ->where('product_id', $id)
                ->first();

            if ($cartItem) {
                // Đã tồn tại thì tăng
                $cartItem->quantity += $request->quantity;
                $cartItem->total_price = $product->price_sale > 0 ? $cartItem->quantity * $product->price_sale : $cartItem->quantity * $product->price;
                $cartItem->save();

                return back()->with('success', 'Số lượng sản phẩm tăng thành công!');
            } else {
                // Sản phẩm chưa tồn tại thì thêm mới
                Cart::create([
                    'quantity' => $request->quantity,
                    'product_id' => $id,
                    'user_id' => $userId,
                    'total_price' =>  $product->price_sale > 0 ? $request->quantity * $product->price_sale : $request->quantity * $product->price
                ]);

                return back()->with('success', 'Sản phẩm thêm vào giỏ hàng thành công!');
            }
        } catch (\Exception $exception) {
            Log::error('CartController@store: ' . $exception->getMessage());

            return back()->with('error', 'Không thể thêm sản phẩm vào giỏ hàng - Vui lòng đăng nhập để tiếp tục!');
        }
    }
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

    public function updateCart(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
    
        foreach ($cartItems as $cartItem) {
            $quantityFieldName = 'quantity_' . $cartItem->id;
            $quantity = $request->input($quantityFieldName);
    
            if ($quantity > 0) {
                $cartItem->quantity = $quantity;
                $cartItem->total_price = $cartItem->product->price_sale > 0 ? $cartItem->product->price_sale * $quantity : $cartItem->product->price * $quantity;
                $cartItem->save();
            }
        }
    
        return redirect()->route('cartPage')->with('success', 'Giỏ hàng đã được cập nhật');
    }
    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();

            return back()->with('success', 'Sản phẩm giỏ hàng đã xóa thành công!');
        } catch (\Exception $exception) {
            Log::error('CartController@destroy: ', [$exception->getMessage()]);


            return back()->with('error', 'Sản phẩm giỏ hàng đã xóa thất bại!');
        }
    }
}
