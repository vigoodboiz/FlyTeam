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
        'delivery_status',
        'quantity',
        'total_price',

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

    
    protected static function boot()
    {
        parent::boot();

        static::updated(function ($order) {
            if ($order->delivery_status == 'Đã Giao Hàng') {
                $userId = $order->user_id;
                Member::where('user_id', $userId)->increment('reward_points');
            }
        });
    }

}