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

        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate file type and size
        ]);
    
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = 'profile_' . auth()->user()->id . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('profile_pictures', $image, $imageName);
    
            // Update user's profile picture path in database
            auth()->user()->update(['profile_picture' => 'profile_pictures/' . $imageName]);
    
            return redirect()->back()->with('success', 'Profile picture updated successfully.');
        }
    
        return redirect()->back()->with('error', 'Failed to update profile picture.');
    }
}