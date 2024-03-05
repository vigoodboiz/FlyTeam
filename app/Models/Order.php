<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'cart_id',
        'product_id',
        'payment_status',
        'delivery_status'
    ];
    
    public function cart(){
        return $this->hasOne(Cart::class, 'id', 'cart_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Products::class);
    }

    
}