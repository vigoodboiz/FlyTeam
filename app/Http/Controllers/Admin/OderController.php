<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Oder;
use App\Http\Controllers\Controller;
class OderController extends Controller
{
    //
    public function listOder(Request $request){
        $title = "Danh Sách Đơn Hàng";
         $oder = new oder();
         $listOder = $oder::all();
         return view('admin.oder.list', compact('listOder','title'));
    }

    public function addOder(Request $request){
        $title = "Thêm Đơn Hàng";
        if($request ->isMethod('POST')){
            $params = $request->except('_token');
            $oder = Oder::create($params);
        }
        return view('admin.oder.add',compact('title'));
    }

    public function editoder(Request $request , $id){
        $title = "Sửa Đơn Hàng";
        $oder = DB::table('oder')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = Oder::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listOder');
            }
        }
        return view('admin.oder.edit',compact('oder','title'));
    }

    public function deleteoder(Request $request , $id){
        $oder = Oder::where('id',$id)->delete();
        if($oder){
            return redirect()->route('listOder');
        }
    }
}
