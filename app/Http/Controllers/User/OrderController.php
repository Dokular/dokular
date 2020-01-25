<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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

            $owner = $user->vehicleOwner($order, $request->post('reference'));

            $owner->deliveryAddress($request);

            foreach($order['products'] as $product ){
                $owner->createOrders($product);
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
