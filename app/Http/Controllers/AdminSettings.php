<?php

namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Http\Request;

class AdminSettings extends Controller
{
    //
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings', compact('settings'));
    }
}
