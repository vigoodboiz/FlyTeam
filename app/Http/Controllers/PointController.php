<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    //
    
        public function index()
        {

        
            $userId = Auth::id();
            $members = Member::where('user_id',$userId)->get();
            return view('page.point', ['members' => $members]);
        }
    
}
