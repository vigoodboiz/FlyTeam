<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    protected $table = 'user_coupon'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = ['user_id', 'coupon_id']; // Các trường có thể được gán giá trị

    // Định nghĩa quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Định nghĩa quan hệ với model Coupon
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}