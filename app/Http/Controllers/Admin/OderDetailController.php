<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OderDetail;
use App\Models\order;
use App\Http\Controllers\Controller;


class OderDetailController extends Controller
{
    //
    public function list(Request $request){
        $title = "Danh Sách Chi Tiết Đơn Hàng";
        $oder_detail = new order();
        $listOder_detail = $oder_detail::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.OderDetail.list', compact('listOder_detail','title'))->with('i',(request()->input('page',1)-1)*5);
    }

    
}

