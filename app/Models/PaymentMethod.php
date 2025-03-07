<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable = ['payment_method', 'payment_method_type_id', 'image_path'];
    public function type()
    {
        return $this->belongsTo(PaymentMethodType::class, 'payment_method_type_id');
    }

}
