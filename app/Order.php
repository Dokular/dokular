<?php

namespace App;

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
