<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{
    use HasFactory;
    protected $table = "oder_detail";
    protected $fillable = [
        'product_id',
        'oder_id',
        'price',
        'quantity'
    ];
}
}
