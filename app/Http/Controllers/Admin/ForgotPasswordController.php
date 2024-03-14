<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function forgotPass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $otp = Str::random(6); // Generate a random 6-digit OTP
        $user->otp = $otp;
        $user->otp_verified_at = null; // Reset OTP verified timestamp
        $user->otp_expiry = Carbon::now()->addMinutes(5); // Set OTP expiry time to 5 minutes
        $user->save();

        // You need to define SendOTP notification
        $user->notify(new SendOTP($otp));

        return response()->json(['message' => 'OTP has been sent to your email']);
    }

    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|min:6|max:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)
                    ->where('otp', $request->otp)
                    ->where('otp_expiry', '>=', Carbon::now())
                    ->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid OTP'], 422);
        }

        // Mark OTP as verified
        $user->otp_verified_at = Carbon::now();
        $user->save();

        return response()->json(['message' => 'OTP verified successfully']);
    }
}