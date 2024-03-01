<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Exception;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
class CartController extends Controller
{
    //

    public function check_coupon(Request $request)
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/mm/dd');
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();

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
                return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
            }
        } else {
            return redirect()->back()->with('error', 'Mã giảm giá không đúng hoặc đã hết hạn');
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
                'message' => 'Đã có lỗi nghiêm trọng xảy ra'
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
                $cartItem->total_price = $cartItem->quantity * $product->price_sale;
                $cartItem->save();

                return back()->with('message', 'Product quantity increased successfully');
            } else {
                // Sản phẩm chưa tồn tại thì thêm mới
                Cart::create([
                    'quantity' => $request->quantity,
                    'product_id' => $id,
                    'user_id' => $userId,
                    'total_price' => $request->quantity * $product->price_sale
                ]);

                return back()->with('message', 'Product added to cart successfully');
            }
        } catch (\Exception $exception) {
            Log::error('CartController@store: ' . $exception->getMessage());

            return back()->with('message', 'Failed to add product to cart');
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
}
