<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'category_id',
        'product_id',
        'price'
    ];
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
