<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function owners()
    {
        return $this->belongsToMany(Owner::class);
    }
}
