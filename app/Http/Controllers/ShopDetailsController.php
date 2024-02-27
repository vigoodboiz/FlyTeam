<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductView;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ShopDetailsController extends Controller
{

    public function index($id_pro)
    {
        if ($id_pro) {
            
            $product_detail = Products::where('id', $id_pro)->get();
            Products::where('id',$id_pro)->increment('view_count');
            // product same
            $id_cate = Products::where('id', $id_pro)->value('id_category');
            $product_same = Products::where('id_category', $id_cate)->where('id', '<>', $id_pro)->paginate(9);
        }
        return view('page.product-details', compact('product_detail', 'product_same'));
    }

    
}
