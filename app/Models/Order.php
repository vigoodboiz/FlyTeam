<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'cart_id',
        'payment_status',
        'quantity',
        'total_price',
    ];
    
    public function cart(){
        return $this->hasOne(Cart::class, 'id', 'cart_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function product()
    {
        return $this->belongsToMany(Products::class);
    }
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}