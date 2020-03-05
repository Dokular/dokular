<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    public function state()
    {
        return $this->hasOne(State::class);
    }
}
