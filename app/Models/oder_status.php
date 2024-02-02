<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oder_status extends Model
{
    use HasFactory;
    protected $table = "oder_status";
    protected $fillable = [
        'oder_id',
        'status'
    ];
}
