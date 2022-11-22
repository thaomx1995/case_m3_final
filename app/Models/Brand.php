<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brand';

    protected $fillable = [
        'brand_name',
        'brand_desc',
        'brand_status',

    ];
    function products()
    {
        return $this->hasMany(Product::class , 'id');
    }
}
