<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use App\Models\User;

class register extends Controller
{
    public function index()
    {
        return view('client.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'profile_picture' => 'nullable|image',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $profilePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }
        $verificationCode = rand(100000, 999999);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'profile_picture' => $profilePath,
            'password' => Hash::make($request->password),
            'verification_code' => $verificationCode,
            'email_verified_at' => null,
        ]);
        Mail::to($user->email)->send(new VerificationMail($user));

        return redirect()->route('verification.form')
            ->with('success', 'Registration successful! A verification code has been sent to your email.');
    }
}
