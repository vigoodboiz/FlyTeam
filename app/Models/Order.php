<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'cart_id',
        'product_id',
        'payment_status',
        'delivery_status',
        'quantity',
        'total_price',
        'note',

    ];
    
    public function cart(){
        return $this->hasOne(Cart::class, 'id', 'cart_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function product(): BelongsTo {
        return $this->belongsTo(Products::class);
    }
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

}