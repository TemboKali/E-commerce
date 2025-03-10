<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customerInfo;
use App\Models\Product;

class CustomerInfoController extends Controller
{
    public function showForm()
    {
        return view('client.customerInfo');
    }

    public function storeInfo(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customer_infos,email',
            'phone' => 'required|string|max:15',
        ]);

        $customer = CustomerInfo::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        $productId = session('product_id');
        return redirect()->route('client.address', ['id' => $productId]);
    }
    public function showAddress($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('client.address', compact('product'));
    }
}
