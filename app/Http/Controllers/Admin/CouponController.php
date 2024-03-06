<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Carbon;

class CouponController extends Controller
{
   
        public function unset_coupon(){
            $coupon = Session::get('coupon');
            if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('success', 'Coupon deleted successfully!');;
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
        return Redirect::to('admin/list-coupon')->with('success', 'Coupon deleted successfully!');;
    }
    public function list_coupon()
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
        $coupon = Coupon::all();
        return view('admin.coupon.list_coupon')->with(compact('coupon','today'));
    }
    public function insert_coupon_code(Request $request)
    {
        $data = $request->all();
        $coupon = new Coupon;

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_date_start = $data['coupon_date_start'];
        $coupon->coupon_date_end = $data['coupon_date_end'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();
        return Redirect::to('admin/list-coupon')->with('success', 'Coupon updated successfully!');
    }
}