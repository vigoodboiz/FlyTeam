<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\oder_detail;

class oder_detailController extends Controller
{
    //
    public function list(Request $request){
        $oder_detail = new oder_detail();
        $listOder_detail = $oder_detail::all();
        return view('oder_detail.list', compact('listOder_detail'));
    }

    public function add(Request $request){
        if($request->isMethod('POST')){
            $params = $request->except('_token');
             $oder_detail = oder_detail::create($params);
        }
        return view('oder_detail.add');
    }

    public function edit(Request $request , $id){
        $oder_detail = DB::table('oder_detail')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = oder_detail::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listOder_detail');
            }
        }
        return view('oder_detail.edit',compact('oder_detail'));
    }

    public function delete(Request $request , $id){
        $oder_detail = oder_detail::where('id',$id)->delete();
        if($oder_detail){
            return redirect()->route('listOder_detail');
        }
    }
}
