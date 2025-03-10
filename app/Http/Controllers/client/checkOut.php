<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class checkOut extends Controller
{
    public function buyNow(Request $request)
    {
        $productId = $request->input('product_id');

        if (!$productId) {
            return redirect()->back()->with('error', 'No product selected.');
        }

        session(['product_id' => $productId]); // ✅ Store product ID in session
        $request->session()->save(); // ✅ Ensure session is saved
        return redirect()->route('client.customerInfo');
    }
}
