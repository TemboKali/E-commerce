<?php

namespace App\Http\Controllers\paymentIntegration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethodType;
use App\Models\PaymentMethod;

class paymentMethods extends Controller
{
    public function index()
    {

        $paymentMethodTypes = PaymentMethodType::with('paymentMethods')->get();
        $paymentMethods = PaymentMethod::with('type')->get();
        return view('admin.payment', compact('paymentMethodTypes', 'paymentMethods'));
    }
    public function storePaymentMethodType(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:payment_method_types,type',
        ]);

        PaymentMethodType::create([
            'type' => $request->input('name'),
        ]);

        return redirect()->back()->with('success', 'Payment Method Type added successfully.');
    }
    public function storePaymentMethod(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'payment_method_type_id' => 'required|exists:payment_method_types,id',
            'image_path' => 'nullable|image'
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('payment_methods', 'public');
        }

        PaymentMethod::create([
            'payment_method' => $request->input('name'),
            'payment_method_type_id' => $request->input('payment_method_type_id'),
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Payment Method added successfully.');
    }

}
