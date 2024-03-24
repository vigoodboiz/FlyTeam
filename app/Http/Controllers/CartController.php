<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use App\Models\UserCoupon;
use Exception;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function check_coupon(Request $request)
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
        $data = $request->all();
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('shopGrid')->with('error', 'Bạn không có sản phẩm nào cả - Vui lòng thêm sản phẩm vào giỏ hàng!');
        } else {
            $coupon = Coupon::where('coupon_code', $data['coupon'])
                ->where('coupon_status', 1)
                ->where('coupon_date_end', '>=', $today)
                ->first();
            if ($coupon) {
                $couponId = $coupon->id;
                $couponCode = $request->input('coupon_code');
                $couponUser = UserCoupon::where('coupon_id', $couponId)
                    ->where('user_id', auth()->user()->id)
                    ->first();
                if ($coupon && !$couponUser) {

                    UserCoupon::create([
                        'coupon_id' => $couponId,
                        'user_id' => auth()->user()->id,
                        'coupon_code' => $request->coupon,
                    ]);

                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    );

                    Session::put('coupon', $cou);
                    Session::save();
                    return back()->with('success', "Khuyến mại đã được sử dụng thành công!");
                } else {
                    return back()->with('error', "Khuyến mại đã được sử dụng!");
                }
            } else {
                return redirect()->back()->with('error', 'Mã giảm giá không đúng, đã hết hạn hoặc bạn đã sử dụng rồi');
            }
        }
    }

    public function index()
    {
        try {
            $userId = Auth::id();
            $cartItems = Cart::where('user_id', $userId)->get();

            $totalPrice = $this->calculateTotalPrice();
            $new_product = Products::orderBy('created_at', 'DESC')->limit(3)->get();
            return view('page.cart', compact('cartItems', 'totalPrice', 'new_product'));
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
                if ($request->quantity > $product->quantity_product) {
                    return back()->with('error', 'Không thể thêm sản phẩm vào giỏ hàng - sản phẩm vượt quá số lượng cho phép');
                } elseif ($request->quantity == 0) {
                    return back()->with('error', 'Không thể thêm sản phẩm vào giỏ hàng - số lượng không được bằng 0');
                } else {
                    $existingCartItem = Cart::where('product_id', $id)
                        ->where('user_id', $userId)
                        ->where('variants', $request->variantName)
                        ->first();

                    if ($existingCartItem) {
                        $existingCartItem->quantity += $request->quantity;
                        $existingCartItem->total_price = $product->price_sale > 0 ? $existingCartItem->quantity * $product->price_sale : $existingCartItem->quantity * $product->price;
                        $existingCartItem->save();

                        return back()->with('success', 'Số lượng sản phẩm tăng thành công!');
                    } else {
                        if ($request->quantity > 0 && $request->quantity <= $product->quantity_product) {
                            Cart::create([
                                'quantity' => $request->quantity,
                                'product_id' => $id,
                                'user_id' => $userId,
                                'total_price' => $product->price_sale > 0 ? $request->quantity * $product->price_sale : $request->quantity * $product->price,
                                'variants' => $request->variantName
                            ]);

                            return back()->with('success', 'Sản phẩm thêm vào giỏ hàng thành công!');
                        } elseif ($request->quantity == 0) {
                            return back()->with('error', 'Không thể thêm sản phẩm vào giỏ hàng - số lượng không được bằng 0');
                        } else {
                            return back()->with('error', 'Không thể thêm sản phẩm vào giỏ hàng - sản phẩm vượt quá số lượng cho phép');
                        }
                    }
                }
            } else {
                // Sản phẩm chưa tồn tại thì thêm mới
                if ($request->quantity > 0 && $request->quantity <= $product->quantity_product) {
                    Cart::create([
                        'quantity' => $request->quantity,
                        'product_id' => $id,
                        'user_id' => $userId,
                        'total_price' => $product->price_sale > 0 ? $request->quantity * $product->price_sale : $request->quantity * $product->price,
                        'variants' => $request->variantName
                    ]);

                    return back()->with('success', 'Sản phẩm thêm vào giỏ hàng thành công!');
                } elseif ($request->quantity == 0) {
                    return back()->with('error', 'Không thể thêm sản phẩm vào giỏ hàng - số lượng không được bằng 0');
                } else {
                    return back()->with('error', 'Không thể thêm sản phẩm vào giỏ hàng - sản phẩm vượt quá số lượng cho phép');
                }
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
        if ($cartItems->isEmpty()) {
            return redirect()->route('shopGrid')->with('error', 'Bạn không có sản phẩm nào cả - Vui lòng thêm sản phẩm vào giỏ hàng!');
        } else {

            foreach ($cartItems as $cartItem) {
                $quantityFieldName = 'quantity_' . $cartItem->id;
                $quantity = $request->input($quantityFieldName);

                if ($quantity > $cartItem->product->quantity_product) {
                    return redirect()->route('cartPage')->with('error', 'Số lượng sản phẩm vượt quá số lượng sản phẩm cho phép');
                } elseif ($quantity == 0) {
                    return redirect()->route('cartPage')->with('error', 'Số lượng sản phẩm không được bằng 0');
                } else {
                    $cartItem->quantity = $quantity;
                    $cartItem->total_price = $cartItem->product->price_sale > 0 ? $cartItem->product->price_sale * $quantity : $cartItem->product->price * $quantity;
                    $cartItem->save();
                }
            }

            return redirect()->route('cartPage')->with('success', 'Giỏ hàng đã được cập nhật!');
        }
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
