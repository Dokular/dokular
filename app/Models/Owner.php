<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'transaction',
        'name',
        'identity',
        'car'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
