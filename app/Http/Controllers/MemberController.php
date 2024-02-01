<?php

// app\Http\Controllers\MemberController.php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // ... các phương thức khác
    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        // Validate và xử lý dữ liệu
    
        $member = new Member([
            'user_id' => $request->input('user_id'),
            'updated_date' => now(), // Hoặc giá trị mà bạn muốn cung cấp
            'member_name' => $request->input('member_name'),
            'incentives' => $request->input('incentives'),
            'condition' => $request->input('condition'),
            'membership_card' => $request-> input ('membership_card'),
            'total_target' => $request->input('total_target'),
            'reward_points' =>$request->input('reward_points'),
        ]);
    
        $member->save();
    
        // Rest của mã lưu
    
        return redirect()->route('members.index');
    }

    public function index()
    {
        $members = Member::all(); // Lấy tất cả các thành viên từ cơ sở dữ liệu

        return view('members.index', compact('members'));
    }

    public function show($id)
    {
        $member = Member::findOrFail($id); // Tìm một thành viên theo ID

        return view('members.show', ['member' => $member]);
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id); // Tìm một thành viên theo ID

        return view('members.edit', ['member' => $member]);
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id); // Tìm một thành viên theo ID

        $member->delete(); // Xóa thành viên

        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
    

    public function update(Request $request, Member $member)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'member_name'=>'required',
            'incentives'=>'required',
            'condition'=>'required',
            'membership_card'=>'required',
            'total_target' => 'required',
            'reward_points'=>'required',
        ]);

        // Cập nhật thành viên
        $member->update($validatedData);

        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    public function Ranking()
{
    // $members = Member::orderBy('reward_points')->get();
    
    // $rankings = $members->groupBy(function ($member) {
    //     if ($member->reward_points>= 80) {
    //         return 'A';
    //     } elseif ($member->reward_points>= 60) {
    //         return 'B';
    //     } else {
    //         return 'C';
    //     }
    // });

    $members = Member::orderBy('reward_points', 'desc')->get();

    $rankings = $members->groupBy(function ($member) {
        if ($member->reward_points >= 80) {
            return 'A';
        } elseif ($member->reward_points >= 60) {
            return 'B';
        } else {
            return 'C';
        }
    });

    return view('members.Ranking', compact('rankings'));
}
}