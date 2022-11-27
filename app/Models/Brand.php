<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Brand extends Model
{
    use HasFactory,Notifiable, SoftDeletes;
    protected $table = 'brand';

    protected $fillable = [
        'brand_name',
        'brand_desc',
        'brand_status',
        'deleted_at'

    ];
    function products()
    {
        return $this->hasMany(Product::class , 'id');
    }
}
