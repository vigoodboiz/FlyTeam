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
        $listOder_status = $oder_status::paginate(5);
        return view('admin.OderStatus.list', compact('listOder_status', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function delete(Request $request, $id)
    {
        $oder_status = OderStatus::where('id', $id)->delete();
        if ($oder_status) {
            return redirect()->route('listOder_status');
        }
    }

    public function updateStatus(Request $request)
    {
        $oder = order::findOrFail($request->id);
        $oder->payment_status = $request->status;
        $oder->save();

        return response()->json(['success' => true]);
    }
    public function updateDelivery_status(Request $request)
    {
        $oder = order::findOrFail($request->id);
        $oder->delivery_status = $request->status;
        $oder->save();

        return response()->json(['success' => true]);
    }
}
