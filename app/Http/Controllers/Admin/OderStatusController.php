<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OderStatus;
use App\Models\order;


class OderStatusController extends Controller
{

    public function list(Request $request)
    {
        $title = "Danh Sách Trạng Thái Đơn Hàng";
        $oder_status = new order();
        $listOder_status = $oder_status::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.OderStatus.list', compact('listOder_status', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function updateStatus(Request $request)
    {
        $oder = order::findOrFail($request->id);
        $oder->payment_status = $request->status;
        $oder->save();

        return redirect()->back()->with('success', 'Cập nhập trạng thái thành công!');
    }

    public function updateDelivery_status(Request $request)
    {
        $oder = order::findOrFail($request->id);
        $oder->delivery_status = $request->status;
        $oder->save();

        return redirect()->back()->with('success', 'Cập nhập trạng thái thành công!');
    }
    
}