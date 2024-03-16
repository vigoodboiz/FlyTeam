<?php
namespace App\Models;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}