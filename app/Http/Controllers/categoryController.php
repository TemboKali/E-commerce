<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Setting;

class CategoryController extends Controller
{
    public function index()
    {
        // Get all categories with their associated products
        $categories = Category::with('products')->get();
        return view('admin.category', compact('categories'));
    }

    // Store a new category
    public function storeCategory(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        // Create the category
        //Category::create($request->all());
        Category::create($validatedData);

        return redirect()->route('admin.category')->with('success', 'Category created successfully');
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock_status' => 'required|in:in stock,out of stock',
        ]);

        $product = Product::create($request->all());
        if ($request->hasFile('image_path')) {
            $fileName = time() . $request->file('image_path')->getClientOriginalName();
            $path = $request->file('image_path')->storeAs('image', $fileName, 'public');
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => '/storage/' . $path,
            ]);
        }
        if ($request->hasFile('images_path')) {
            foreach ($request->file('images_path') as $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => '/storage/' . $path,
                ]);
            }
        }

        return redirect()->route('admin.category'); // Redirect to the category page
    }



    // Edit an existing product (update price, description, etc.)
    public function updateProduct(Request $request, Product $product)
    {
        // Validate input
        $request->validate([
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock_status' => 'required|in:in stock,out of stock',
        ]);

        // Update the product
        $product->update($request->all());

        return redirect()->route('admin.category.index'); // Redirect to the category page
    }
    public function deleteProduct(Product $product)
    {
        // Delete associated product images first
        $product->images()->delete();

        // Delete the product
        $product->delete();

        return redirect()->route('admin.category')->with('success', 'Product deleted successfully');
    }

    // Change product stock status (in stock or out of stock)
    public function changeStockStatus(Product $product)
    {
        $product->stock_status = $product->stock_status == 'in stock' ? 'out of stock' : 'in stock';
        $product->save();

        return redirect()->route('admin.category.index');
    }
    public function showProducts($categoryId)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $categoryId)->with('images')->get();
        $settings = Setting::first();

        return view('client.categoriesProducts', compact('categories', 'products', 'settings'));
    }
}
