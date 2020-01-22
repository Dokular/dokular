<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'price',
        'active'
    ];

    protected $hidden = [
        'id',
        'code',
        'created_at',
        'updated_at'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
