<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'total_amount',
        'payment_status',
        'delivery_status',
        'proof_of_payment',
        'location',
        'delivery_time',
    ];
}
