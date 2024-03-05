<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class Cart extends Model
{
    use HasFactory;
    public $appends = ['orderd'];
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Products::class);
    }
    public function getOrderdAttribute(){
        $orderd = Order::where(['cart_id' => $this->id, 'user_id' => Auth::user()->id])->first();
        return $orderd ? true : false;
    }

}