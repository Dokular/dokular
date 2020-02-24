<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class Owner extends Model
{

    protected $fillable = [
        'transaction',
        'name',
        'identity',
        'car',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function createOrders($product)
    {
        $this->orders()->create([
            'product_id' => $product['id'],
            'price' => $product['price']
        ]);
    }

    public function deliveryAddress($request)
    {
        $this->delivery()->create([
            'phone' => $request['phone'],
            'address'=> $request['address'],
            'state' => State::find($request['state_id'],['name'])->name,
            'fee' => $request['fee']
        ]);
    }
}
