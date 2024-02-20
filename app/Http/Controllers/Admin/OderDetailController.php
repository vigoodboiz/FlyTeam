<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\oder_detail;
use App\Models\OderDetail;
use App\Http\Controllers\Controller;

class OderDetailController extends Controller
{
    //
    public function list(Request $request){
        $title = "Danh Sách Chi Tiết Đơn Hàng";
        $oder_detail = new oder_detail();
        $listOder_detail = $oder_detail::all();
        return view('admin.oder_detail.list', compact('listOder_detail','title'));
        $oder_detail = new OderDetail();
        $listOder_detail = $oder_detail::paginate(5);
        return view('admin.OderDetail.list', compact('listOder_detail','title'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function add(Request $request){
        $title = "Thêm Chi Tiết Đơn Hàng";
        if($request->isMethod('POST')){
            $params = $request->except('_token');
             $oder_detail = oder_detail::create($params);
        }
        return view('admin.oder_detail.add',compact('title'));
             $oder_detail = OderDetail::create($params);
        }
        return view('admin.OderDetail.add',compact('title'));
    }

    public function edit(Request $request , $id){
        $title = "Sửa Chi Tiết Đơn Hàng";
        $oder_detail = DB::table('oder_detail')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = oder_detail::where('id',$id)->update($params);
            $resutl = OderDetail::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listOder_detail');
            }
        }
        return view('admin.oder_detail.edit',compact('oder_detail','title'));
    }

    public function delete(Request $request , $id){
        $oder_detail = oder_detail::where('id',$id)->delete();
        return view('admin.OderDetail.edit',compact('oder_detail','title'));
    }
}
