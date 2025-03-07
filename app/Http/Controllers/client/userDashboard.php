<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\Category;
use App\Models\User;

class userDashboard extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $settings = setting::first();
        $users = User::first();
        $categories = Category::with('products')->get();
        return view('client.userDashboard', compact('user', 'settings', 'categories'));
    }
}
