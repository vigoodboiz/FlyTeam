<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
    ];
    
    public function prod(){
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
}