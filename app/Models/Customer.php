<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable

{
    use HasFactory;
    protected $table = 'customer';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'oder_id',

    ];
    function oder()
    {
        return $this->belongsTo(Oder::class , 'id');
    }
}
