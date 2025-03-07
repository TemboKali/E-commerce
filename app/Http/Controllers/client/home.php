<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Setting;

class home extends Controller
{
    public function cats()
    {
        $categories = Category::all();
        $settings = Setting::first();
        return view('client.home', compact('categories', 'settings'));
    }
}
