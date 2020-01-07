<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Category extends Model implements HasMedia
{
    use HasMediaTrait;

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
