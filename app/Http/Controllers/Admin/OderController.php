<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Models\Products;

class OderController extends Controller
{

    //
    public function listOder(Request $request)
    {
        $title = "Danh Sách Đơn Hàng";
        $keyword = $request->input('searchOder');
        $oder = new Order();
        if ($request->post() && $request->searchOder) {
            $listOder = Order::where('address', 'like', '%' . $keyword . '%')->orderBy('created_at', 'desc')->paginate(10);
        }
        else{
            $listOder = $oder::orderBy('created_at', 'desc')->paginate(3);
        }
        return view('admin.oder.list', compact('listOder', 'title'));
    }

    public function showOrder(Order $order){
        return view('admin.oder.show', compact('order'));
    }

    

    
}