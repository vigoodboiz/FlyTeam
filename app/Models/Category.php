<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\CategoryDeleting;
use App\Models\Products;
class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = ['name', 'image'];
    
    protected $dispatchesEvents = [
        'deleting' => CategoryDeleting::class,
    ];

    
    public function deleteProducts()
        {
            $this->products()->delete();
        }

        public function products()
        {
            return $this->hasMany(Products::class, 'id_category');
        }
}
