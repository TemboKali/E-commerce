<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);

        // Get cart from session or create an empty array
        $cart = session()->get('cart', []);

        // If product is already in cart, increase quantity
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            // Add new product to cart
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->images->count() > 0 ? $product->images->first()->image_path : null,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cart_count' => count($cart)
            ]);
        }

        return back()->with('success', 'Product added to cart!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $settings = Setting::first();
        return view('client.cart', compact('cart', 'settings'));
    }
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);
        return back();
    }
    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);
        return back();
    }
}
