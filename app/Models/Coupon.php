<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Coupon extends Model
{   
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'coupon_name', 'coupon_code', 'coupon_time','coupon_number', 'coupon_condition','coupon_date_start','coupon_date_end','coupon_status'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'coupon';

     public function users()
     {
         return $this->belongsToMany(User::class, 'user_coupon', 'coupon_id', 'user_id')->withTimestamps();
     }
    
}