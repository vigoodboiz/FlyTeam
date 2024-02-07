<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OderStatus;
use App\Http\Controllers\Controller;

class OderStatusController extends Controller
{
    //
    public function list(Request $request){
        $title = "Danh Sách Trạng Thái Đơn Hàng";
        $oder_status = new OderStatus();
        $listOder_status = $oder_status::all();
        return view('admin.OderStatus.list', compact('listOder_status','title'));
    }

    public function add(Request $request){
        $title = "Thêm Trạng Thái Đơn Hàng";
        if($request->isMethod('POST')){
            $params = $request->except('_token');
             $oder_status = OderStatus::create($params);
        }
        return view('admin.OderStatus.add',compact('title'));
    }

    public function edit(Request $request , $id){
        $title = "Sửa Trạng Thái Đơn Hàng";
        $oder_status = DB::table('oder_status')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = OderStatus::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listOder_status');
            }
        }
        return view('admin.OderStatus.edit',compact('oder_status','title'));
    }

    public function delete(Request $request , $id){
        $oder_status = OderStatus::where('id',$id)->delete();
        if($oder_status){
            return redirect()->route('listOder_status');
        }
    }
}