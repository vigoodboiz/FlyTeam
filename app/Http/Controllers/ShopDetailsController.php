<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Http\Controllers\Controller;


class ShopDetailsController extends Controller
{

    public function index($id_pro){
        if ($id_pro) {
            // return redirect()->route('shopDetails',$id_pro);
            $product_detail = Products::where('id',$id_pro)->get();

            $id_cate = Products::where('id', $id_pro)->value('id_category');
            $product_same = Products::where('id_category',$id_cate)->where('id','<>', $id_pro)->paginate(9);
        }
        return view('page.shop-details', compact('product_detail','product_same'));
    }
}
