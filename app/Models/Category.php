<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'active',
        'name',
        'description',
        'img'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
