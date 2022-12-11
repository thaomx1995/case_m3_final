<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory,Notifiable, SoftDeletes;
    public $table = 'category';

    protected $fillable = [
        'category_name',
        'category_desc',
        'category_status',
        'deleted_at',
    ];
    function products()
    {
        return $this->hasMany(Product::class , 'category_id', 'id');
    }
}
