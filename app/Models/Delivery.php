<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{

    protected $fillable = [
        'phone',
        'address',
        'state',
        'lga',
        'fee'
    ];
    public function owners()
    {
        return $this->belongsToMany(Owner::class);
    }
}
