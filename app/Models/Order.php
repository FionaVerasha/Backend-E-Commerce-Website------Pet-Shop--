<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'address',
        'cart_items',
        'total_amount',
        'payment_method',
        'payment_status',
        'stripe_session_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'address' => 'array',
        'cart_items' => 'array',
    ];
}
