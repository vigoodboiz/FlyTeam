<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OderDetail;
use App\Models\Order;
use App\Http\Controllers\Controller;


class OderDetailController extends Controller
{
    //
    public function list($id){
        $title = "Danh Sách Chi Tiết Đơn Hàng";
        $order = Order::find($id);
        $oder_detail = new Order();
        $listOder_detail = $oder_detail::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.OderDetail.list', compact('listOder_detail','title'))->with('i',(request()->input('page',1)-1)*5);
    }

    
}