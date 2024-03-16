<?php
namespace App\Models;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}