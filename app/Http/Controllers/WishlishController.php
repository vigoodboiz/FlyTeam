<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlishController extends Controller
{
    //
    public function index(){
        return view('page.wishlist');
    }
}
