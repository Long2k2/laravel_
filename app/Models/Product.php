<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function image()
    {
        return $this->belongsTo(ProductImage::class,'id','product_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }
}
