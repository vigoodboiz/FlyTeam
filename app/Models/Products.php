<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Favorite;
use App\Models\Variant;

class Products extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    public $appends = ['favorited'];
    protected $table = 'products';



    protected $fillable = ['id_category', 'name', 'brand', 'price', 'price_sale',  'describe', 'quantity_product', 'image'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }


    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    // public function getFavoritedAttribute(){
    //     $favorited = Favorite::where(['product_id' => $this->id, 'user_id' => Auth::user()->id])->first();
    //     return $favorited ? true : false;
    // }
    public function orders()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}


