<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'price',
        'active'
    ];

    protected $hidden = [
        'code',
        'created_at',
        'updated_at'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function updateActiveStatus($data)
    {
        if($data['active'] == true){
            $this->update(['active' => 0]);
            return true;
        }

        $this->update(['active' => 1]);

        return true;
    }
}
