<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    use HasFactory;
    protected $table = 'oder';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'note',

    ];
    function customers()
    {
        return $this->hasMany(Customer::class , 'id');
    }
}
