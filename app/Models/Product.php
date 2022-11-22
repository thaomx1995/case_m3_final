<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = [
        'category_id',
        'brand_id',
        'product_desc',
        'product_content',
        'product_price',
        'product_image',
        'product_status',

    ];

    function brand(){
        return $this->belongsTo(Brand::class , 'brand_id','id');
    }
    function category()
    {
        return $this->belongsTo(Category::class ,'category_id', 'id');
    }
}
