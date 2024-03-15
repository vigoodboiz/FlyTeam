<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function product() {
        return $this->belongsTo(Products::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    protected $table = "comments";
    protected $fillable = ['id','product_id','user_id','content','date'];
}
