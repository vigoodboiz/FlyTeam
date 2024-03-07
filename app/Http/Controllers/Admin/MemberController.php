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

    // public function store(Request $request)
    // {
    //     // Validate và xử lý dữ liệu
    
    //     $member = new Member([
    //         'user_id' => $request->input('user_id'),
    //         'updated_date' => now(), // Hoặc giá trị mà bạn muốn cung cấp
    //         'member_name' => $request->input('member_name'),
    //         'incentives' => $request->input('incentives'),
    //         'condition' => $request->input('condition'),
    //         'membership_card' => $request-> input ('membership_card'),
    //         'total_target' => $request->input('total_target'),
    //         'reward_points' =>$request->input('reward_points'),
    //     ]);
    
    //     $member->save();
    
    //     // Rest của mã lưu
    
    //     return redirect()->route('members.index');
    // }
// /////////////////////////////////////////////////////////////////
//     public function index()
// {

//     $users = User::select('id', 'name')->get();


//     foreach ($users as $user) {
//         // Kiểm tra nếu user không có members, thêm mới member
//         if ($user->members->isEmpty()) {
//             $user->members()->create([
//                 'name' => $user->name,
//                 'updated_date' => now(),
//                 'points' => mt_rand(1, 100),
//             ]);
//         }
//         // Member::create([
//         //     // 'user_id' => $user->id,
//         //     'name' => $user->name,
//         //     'updated_date' => now(),
//         //     // 'incentives' => $request->input('incentives'),
//         //     // 'condition' => $request->input('condition'),
//         //     // 'membership_card' => $request-> input ('membership_card'),
//         //     // 'total_target' => $request->input('total_target'),
//         //     'points' => mt_rand(1, 100),
//         // ]);
//     }
//     $members = Member::all();
//     return view('admin.members.index', compact('members'));
// }
// /////////////////////////////////////////////////////////////////
public function index()
{

    $users = User::with('members')->get();

    foreach ($users as $user) {
        
        if ($user->members && !$user->members->isEmpty()) {
            continue;
        }
        $user->members()->create([
            'name' => $user->name,
            'updated_date' => now(),
            'points' => mt_rand(0, 100),
        ]);
    }
    $member = Auth::user()->role_id;
    $members = Member::where('user_id',$member,3)->get();

    return view('admin.members.index', compact('members'));
}
    public function show($id)
    {
        $member = Member::findOrFail($id); // Tìm một thành viên theo ID

        return view('admin.members.show', ['member' => $member]);
    }

//     public function edit($id)
//     {
//         $member = Member::findOrFail($id); // Tìm một thành viên theo ID

//         return view('admin.members.edit', ['member' => $member]);
//     }

//     public function destroy($id)
//     {
//         $member = Member::findOrFail($id); // Tìm một thành viên theo ID

//         $member->delete(); // Xóa thành viên

//         return redirect()->route('members.index')->with('success', 'Member deleted successfully');
//     }
    

//     public function update(Request $request, Member $member)
//     {
//         // Validate dữ liệu đầu vào
//         $validatedData = $request->validate([
//             'user_id' => 'required|integer',
//             'member_name'=>'required',
//             'incentives'=>'required',
//             'condition'=>'required',
//             'membership_card'=>'required',
//             'total_target' => 'required',
//             'reward_points'=>'required',
//         ]);

//         // Cập nhật thành viên
//         $member->update($validatedData);

//         return redirect()->route('members.index')->with('success', 'Member updated successfully');
//     }

//     public function Ranking()
// {
//     // $members = Member::orderBy('reward_points')->get();
    
//     // $rankings = $members->groupBy(function ($member) {
//     //     if ($member->reward_points>= 80) {
//     //         return 'A';
//     //     } elseif ($member->reward_points>= 60) {
//     //         return 'B';
//     //     } else {
//     //         return 'C';
//     //     }
//     // });

//     $members = Member::orderBy('reward_points', 'desc')->get();

//     $rankings = $members->groupBy(function ($member) {
//         if ($member->reward_points >= 80) {
//             return 'A';
//         } elseif ($member->reward_points >= 60) {
//             return 'B';
//         } else {
//             return 'C';
//         }
//     });

//     return view('admin.members.Ranking', compact('rankings'));
// }
// }

    
}