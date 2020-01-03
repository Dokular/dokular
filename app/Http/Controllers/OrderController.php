<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Owner;
use App\Traits\UserTrait;

class OrderController extends Controller
{
    use UserTrait;

    public function store(Request $request)
    {
        $orders = $request->post('order');

        $user = $this->createOrUpdate($request);

        foreach( $orders as $order){
            $owner = new Owner;
            $owner->user_id = $user;
            $owner->transaction = $request->post('reference');
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

        return response()->json(['success' => true]);
    }
}
