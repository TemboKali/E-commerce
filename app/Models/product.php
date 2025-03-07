<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock_status', 'category_id']; // Updated to category_id

    // Define relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define relationship with product images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
