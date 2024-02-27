<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    use HasFactory;


    protected $table = 'products';
    
    protected $fillable = ['id_category', 'name', 'brand',  'describe' ,'price', 'price_sale', 'image'];

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

}

