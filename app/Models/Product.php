<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'name',
        'price',
        'img'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
