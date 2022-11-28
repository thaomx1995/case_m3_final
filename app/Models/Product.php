<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Product extends Model
{
    use HasFactory,Notifiable, SoftDeletes;
    protected $table = 'product';

    protected $fillable = [
        'category_id',
        'brand_id',
        'product_desc',
        'product_content',
        'product_price',
        'product_image',
        'product_status',
        'deleted_at'
    ];



    function brand(){
        return $this->belongsTo(Brand::class );
    }
    function category()
    {
        return $this->belongsTo(Category::class );
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('id', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
