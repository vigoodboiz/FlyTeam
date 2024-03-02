<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    use HasFactory;
    protected $table = 'oder';
    protected $fillable = [
        'user_id',
        'date',
        'total',
        'address'
    ];
}