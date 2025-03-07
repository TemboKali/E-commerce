<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;

class productDescription extends Controller
{
    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $settings = Setting::first();
        return view('client.productDescription', compact('product', 'settings'));
    }
    //
}
