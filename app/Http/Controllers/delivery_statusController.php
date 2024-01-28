<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\delivery_status;

class delivery_statusController extends Controller
{
    //
    public function list(Request $request){
        $delivery_status = new delivery_status();
        $listDelivery_status = $delivery_status::all();
        return view('delivery_status.list', compact('listDelivery_status'));
    }

    public function add(Request $request){
        if($request->isMethod('POST')){
            $params = $request->except('_token');
             $delivery_status = delivery_status::create($params);
        }
        return view('delivery_status.add');
    }

    public function edit(Request $request , $id){
        $delivery_status = DB::table('delivery_status')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = delivery_status::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listDelivery_status');
            }
        }
        return view('delivery_status.edit',compact('delivery_status'));
    }

    public function delete(Request $request , $id){
        $delivery_status = delivery_status::where('id',$id)->delete();
        if($delivery_status){
            return redirect()->route('listDelivery_status');
        }
    }
}
