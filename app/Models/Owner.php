<?php

namespace App\Models;

use App\Events\NewOrderEvent;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{

    protected $dispatchesEvents = [
        'created' => NewOrderEvent::class
    ];
    
    protected $fillable = [
        'transaction',
        'name',
        'identity',
        'car'
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
            'phone' => $request->post('phone'),
            'address'=> $request->post('address'),
            'state' => $request->post('state'),
            'fee' => $request->post('delivery_fee')
        ]);
    }
}
