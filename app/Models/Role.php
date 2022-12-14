<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $table ='role';
    use HasFactory;
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
