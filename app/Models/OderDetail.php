<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;
use App\Models\User;

class OderDetail extends Model
{
    use HasFactory;
    protected $table = "oder_detail";
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function orders(){
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}