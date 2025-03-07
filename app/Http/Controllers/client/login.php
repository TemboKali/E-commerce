<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function index()
    {
        return view('client.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');
        $loginField = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$loginField => $credentials['login'], 'password' => $credentials['password']])) {
            $user = Auth::user();
            if (is_null($user->email_verified_at)) {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Your email address is not verified. Please check your email for the verification code.']);
            }
            $request->session()->regenerate();
            return redirect()->route('client.userDashboard')->with('success', 'Logged in successfully!');
        }
        return back()->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('client.login')->with('success', 'Logged out successfully.');
    }
}

