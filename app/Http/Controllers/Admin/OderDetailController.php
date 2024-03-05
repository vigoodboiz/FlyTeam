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
        $listOder_detail = $oder_detail::paginate(5);
        return view('admin.OderDetail.list', compact('listOder_detail','title'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function add(Request $request){
        $title = "Thêm Chi Tiết Đơn Hàng";
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $oder_detail = OderDetail::create($params);
        }
        return view('admin.OderDetail.add',compact('title'));
    }

    public function edit(Request $request , $id){
        $title = "Sửa Chi Tiết Đơn Hàng";
        $oder_detail = DB::table('oder_detail')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = OderDetail::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listOder_detail');
            }
        }
        return view('admin.oder_detail.edit',compact('oder_detail','title'));
    }



    public function delete(Request $request , $id){
        $oder_detail = OderDetail::where('id',$id)->delete();
        if($oder_detail){
            return redirect()->route('listOder_detail');
        }
    }
}

