<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Category extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(200)
              ->height(200)
              ->sharpen(10);

        $this->addMediaConversion('square')
              ->width(350)
              ->height(200)
              ->sharpen(10);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
