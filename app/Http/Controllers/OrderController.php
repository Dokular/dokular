<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Owner;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $orders = $request->post('order');

        foreach( $orders as $order){
            $owner = new Owner;
            $owner->name = $order['owner'];
            $owner->identity = $order['mark'];
            $owner->car = $order['make'];
            $owner->save();
            foreach($order['products'] as $product ){
                $owner->orders()->create([
                    'category_id' => $product['category_id'],
                    'product_id' => $product['id'],
                    'price' => $product['price']
                ]);
            }
        }
    }
}
