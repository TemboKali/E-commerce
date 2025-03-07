<?php

namespace App\Http\Controllers\client\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('client.auth.verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('verification_code', $request->verification_code)
            ->first();

        if (!$user) {
            return back()->withErrors(['verification_code' => 'The verification code is incorrect.']);
        }

        // Mark the user as verified
        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->save();

        return redirect()->route('client.login')
            ->with('success', 'Your email has been verified. You can now log in.');
    }
}
