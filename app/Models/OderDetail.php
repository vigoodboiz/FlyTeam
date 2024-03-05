<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "oder_detail";
    protected $fillable = [
        'product_id',
        'oder_id',
        'price',
        'quantity'
    ];

    public function product(){
        return $this->hasOne(Products::class, 'product_id', 'id');
    }
}