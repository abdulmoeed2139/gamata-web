<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordCustomController extends Controller
{
    // Step 1: Show Forgot Password Page
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // Step 2: Send OTP to Mobile/Email
    public function sendOtp(Request $request)
    {
        $request->validate(['mobile' => 'required']);

        $user = User::where('mobile', $request->mobile)->first();
        if (!$user) {
            return back()->withErrors(['mobile' => 'Mobile number not found']);
        }

        $otp = rand(100000, 999999);
        session(['reset_otp' => $otp, 'reset_mobile' => $request->mobile]);

        // Yaha SMS API integrate karein (Filhaal log me store kar raha hoon)
        \Log::info("OTP for {$request->mobile}: $otp");

        return redirect()->back()->with('status', 'OTP sent to your mobile!');
    }

    // Step 3: Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required']);

        if ($request->otp == session('reset_otp')) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Invalid OTP']);
    }

    // Step 4: Reset Password
    public function resetPassword(Request $request)
    {
        $request->validate(['password' => 'required|confirmed|min:6']);

        $user = User::where('mobile', session('reset_mobile'))->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            session()->forget(['reset_otp', 'reset_mobile']);
            return redirect('/login')->with('success', 'Password reset successfully!');
        }

        return back()->withErrors(['mobile' => 'Something went wrong!']);
    }
}
