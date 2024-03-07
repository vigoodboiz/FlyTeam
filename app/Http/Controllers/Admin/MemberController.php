<?php

// app\Http\Controllers\MemberController.php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class MemberController extends Controller
{
    // ... các phương thức khác
    public function create()
    {
        return view('admin.members.create');
    }

public function index()
{
    $Role = User::where('role_id', 3)->get();

    foreach ($Role as $user) {
        
        if ($user->members && !$user->members->isEmpty()) {
            continue;
        }
        $user->members()->create([
            'name' => $user->name,
            'updated_date' => now(),
            'points' => mt_rand(0, 100),
        ]);
    }
    return view('admin.members.index', compact('Role'));
}
    public function show($id)
    {
        $member = Member::findOrFail($id); // Tìm một thành viên theo ID

        return view('admin.members.show', ['member' => $members]);
    }
    


    
}