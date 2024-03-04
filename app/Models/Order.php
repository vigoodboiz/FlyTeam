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
    ];
    
    public function cart(){
        return $this->hasOne(Cart::class, 'id', 'cart_id');
    }
}