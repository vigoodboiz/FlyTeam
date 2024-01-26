<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Oder;
class OderController extends Controller
{
    //
    public function listOder(Request $request){
         $oder = new oder();
         $listOder = $oder::all();
         return view('oder.list', compact('listOder'));
    }

    public function addOder(Request $request){
        if($request ->isMethod('POST')){
            $params = $request->except('_token');
            $oder = Oder::create($params);
        }
        return view('oder.add');
    }

    public function editoder(Request $request , $id){
        $oder = DB::table('oder')->where('id',$id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $resutl = Oder::where('id',$id)->update($params);
            if($resutl){
                return redirect()->route('listOder');
            }
        }
        return view('oder.edit',compact('oder'));
    }

    public function deleteoder(Request $request , $id){
        $oder = Oder::where('id',$id)->delete();
        if($oder){
            return redirect()->route('listOder');
        }
    }
}
