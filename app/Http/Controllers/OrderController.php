<?php

namespace App\Http\Controllers;

use App\Http\Resources\OwnerResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Owner;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use UserTrait;

    public function store(Request $request)
    {
        $orders = $request->post('order');

        $user_id = $this->createOrUpdate($request);

        $user = User::find($user_id);

        foreach( $orders as $order){
            $owner = $user->owners()->create([
                        'transaction' => $request->post('reference'),
                        'name' => $order['owner'],
                        'identity' => $order['mark'],
                        'car' => $order['make'],
                    ]);

            foreach($order['products'] as $product ){
                $owner->orders()->create([
                    'product_id' => $product['id'],
                    'price' => $product['price']
                ]);
            }
        }
        return response()->json(['success' => true]);
    }

    public function getOwnersAndOrders()
    {
        $orders = Owner::with('orders.product')->where('user_id', Auth::id())->get();
        //return $orders;
        return OwnerResource::collection($orders);
    }
}
