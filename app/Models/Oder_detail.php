<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder_detail extends Model
{
    use HasFactory;
    protected $table = 'oder_detail';

    protected $fillable = [
        'product_price',
        'product_quantity',
        'product_total_price',
        'product_id',
        'oder_id',

    ];
}
