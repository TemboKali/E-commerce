<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethodType extends Model
{

    protected $fillable = ['type'];

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }
    use HasFactory;
}
