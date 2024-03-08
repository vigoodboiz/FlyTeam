<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function index($product_id)
    {
        $data = [
            'product_id' => $product_id,
            'user_id' => Auth::user()->id,
        ];
        $favorited = Favorite::where(['product_id' => $product_id, 'user_id' => Auth::user()->id])->first();
        if($favorited){
            $favorited->delete();
            return redirect()->back()->with('success', 'You deleted this product!');
        } else {
            Favorite::create($data);
            return redirect()->back()->with('success', 'You love this product!');
        }
    }

}