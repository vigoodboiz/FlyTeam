<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\delivery_status;
use App\Http\Controllers\Controller;

class delivery_statusController extends Controller
{
    //
    public function list(Request $request){
        $title = "Danh Sách Trạng Thái Vận Chuyển";
        $delivery_status = new delivery_status();
        $listDelivery_status = $delivery_status::all();
        return view('admin.delivery_status.list', compact('listDelivery_status','title'));
    }

    public function add(Request $request){
        $title = "Thêm Trạng Thái Vận Chuyển";
        if($request->isMethod('POST')){
            $params = $request->except('_token');
             $delivery_status = delivery_status::create($params);
        }
        return view('admin.delivery_status.add',compact('title'));
    }

    public function edit(Request $request , $id){
        $title = "Sửa Trạng Thái Vận Chuyển";
        $delivery_status = DB::table('delivery_status')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = delivery_status::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listDelivery_status');
            }
        }
        return view('admin.delivery_status.edit',compact('delivery_status','title'));
    }

    public function delete(Request $request , $id){
        $delivery_status = delivery_status::where('id',$id)->delete();
        if($delivery_status){
            return redirect()->route('listDelivery_status');
        }
    }
}
