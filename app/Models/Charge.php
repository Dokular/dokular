<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = [
        'charge'
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at"
    ];
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
    */
    public $incrementing = false;
}
