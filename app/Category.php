<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
