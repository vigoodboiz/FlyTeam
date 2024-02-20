<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\oder_status;
use App\Http\Controllers\Controller;
use App\Models\OderStatus;
use App\Http\Requests\OderStatusRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OderStatusController extends Controller
{
    //
    public function list(Request $request){
        $title = "Danh Sách Trạng Thái Đơn Hàng";
        $oder_status = new oder_status();
        $listOder_status = $oder_status::all();
        return view('admin.oder_status.list', compact('listOder_status','title'));
    }

    public function add(Request $request){
        $title = "Thêm Trạng Thái Đơn Hàng";
        if($request->isMethod('POST')){
            $params = $request->except('_token');
             $oder_status = oder_status::create($params);
        }
        return view('admin.oder_status.add',compact('title'));
    }

    public function edit(Request $request , $id){
        $title = "Sửa Trạng Thái Đơn Hàng";
        $oder_status = DB::table('oder_status')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = oder_status::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listOder_status');
            }
        }
        return view('admin.oder_status.edit',compact('oder_status','title'));
    }

    public function delete(Request $request , $id){
        $oder_status = oder_status::where('id',$id)->delete();
        if($oder_status){
            return redirect()->route('listOder_status');
        }
    }
}
