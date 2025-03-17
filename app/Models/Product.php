<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'delivery_charge',
        'stock_quantity',
        'brand',
        'images',
        'sale_price',
        'sale_price_effective_date',
        'is_active'
    ];
}
