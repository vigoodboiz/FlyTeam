<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|max:10|string',
            'address' => 'required|max:255',
        ]);
    
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = 'profile_' . auth()->user()->id . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('profile_pictures', $image, $imageName);
    
            // Update user's profile picture path in database
            auth()->user()->update(['profile_picture' => 'profile_pictures/' . $imageName]);
            return redirect()->back()->with('success', 'Hình ảnh hồ sơ cập nhật thành công!');
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return redirect()->back()->with('success', 'Hồ sơ được cập nhật thành công!');
        }
        return redirect()->back()->with('error', 'Hình ảnh hồ sơ cập nhật thất bại!');
    }
}