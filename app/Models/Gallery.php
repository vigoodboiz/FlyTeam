<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';
    
    protected $fillable = ['name', 'image', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}