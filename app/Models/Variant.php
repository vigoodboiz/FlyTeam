<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
class Variant extends Model
{
    use HasFactory;

    protected $table = 'variant';

    protected $fillable = ['product_name', 'name', 'value', 'product_id' ,'price', 'price_sale'];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
