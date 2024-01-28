<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\oder_status;

class oder_status_statusController extends Controller
{
    //
    public function list(Request $request){
        $oder_status = new oder_status();
        $listOder_status = $oder_status::all();
        return view('oder_status.list', compact('listOder_status'));
    }

    public function add(Request $request){
        if($request->isMethod('POST')){
            $params = $request->except('_token');
             $oder_status = oder_status::create($params);
        }
        return view('oder_status.add');
    }

    public function edit(Request $request , $id){
        $oder_status = DB::table('oder_status')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = oder_status::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listOder_status');
            }
        }
        return view('oder_status.edit',compact('oder_status'));
    }

    public function delete(Request $request , $id){
        $oder_status = oder_status::where('id',$id)->delete();
        if($oder_status){
            return redirect()->route('listOder_status');
        }
    }
}
