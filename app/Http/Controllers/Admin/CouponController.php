<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Redirect;


class CouponController extends Controller
{
   
        public function unset_coupon(){
            $coupon = Session::get('coupon');
            if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
    }
    public function insert_coupon()
    {
        return view('admin.coupon.insert_coupon');
    }
    public function delete_coupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');
        return Redirect::to('admin/list-coupon');
    }
    public function list_coupon()
    {
        $coupon = Coupon::all();
        return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }
    public function insert_coupon_code(Request $request)
    {
        $data = $request->all();
        $coupon = new Coupon;

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();
        Session::put('message', 'Thêm mã giảm giá thành công');
        return Redirect::to('admin/list-coupon');
    }
}
