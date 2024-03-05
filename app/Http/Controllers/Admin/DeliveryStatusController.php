<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryStatus;
use App\Http\Controllers\Controller;
use App\Models\order;


class DeliveryStatusController extends Controller
{
    //
    public function list(Request $request){
        $title = "Danh Sách Trạng Thái Vận Chuyển";
        $delivery_status = new order();
        $listDelivery_status = $delivery_status::paginate(5);
        return view('admin.DeliveryStatus.list', compact('listDelivery_status','title'))->with('i',(request()->input('page',1)-1)*5);
    }


    

}
