<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryStatus;
use App\Http\Controllers\Controller;

class DeliveryStatusController extends Controller
{
    //
    public function list(Request $request){
        $title = "Danh Sách Trạng Thái Vận Chuyển";
        $delivery_status = new DeliveryStatus();
        $listDelivery_status = $delivery_status::paginate(5);
        return view('admin.DeliveryStatus.list', compact('listDelivery_status','title'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function add(Request $request){
        $title = "Thêm Trạng Thái Vận Chuyển";
        if($request->isMethod('POST')){
            $params = $request->except('_token');
             $delivery_status = DeliveryStatus::create($params);
        }
        return view('admin.DeliveryStatus.add',compact('title'));
    }

    public function edit(Request $request , $id){
        $title = "Sửa Trạng Thái Vận Chuyển";
        $delivery_status = DB::table('delivery_status')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = DeliveryStatus::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listDelivery_status');
            }
        }
        return view('admin.DeliveryStatus.edit',compact('delivery_status','title'));
    }

    public function delete(Request $request , $id){
        $delivery_status = DeliveryStatus::where('id',$id)->delete();
        if($delivery_status){
            return redirect()->route('listDelivery_status');
        }
    }
}
