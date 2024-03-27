<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role_id',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }


    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function roles() {
       return $this->hasOne(Role::class, 'id', 'role_id');
    }
    public function hasAnyRole($roles)
{
    return null !== $this->roles()->whereIn('name', $roles)->first();
}
    public function members()
    {
        return $this->hasMany(Member::class);
    }


    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }
    public function orders(){
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'user_coupon', 'user_id', 'coupon_id')->withTimestamps();
    }
}
