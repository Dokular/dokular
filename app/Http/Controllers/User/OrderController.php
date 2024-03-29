<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\OwnerResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use App\Jobs\AdminNotifyEmail;
use App\Jobs\CustomerReceiptEmail;
use App\Traits\PaymentTrait;

class OrderController extends Controller
{
    use PaymentTrait;

    public function store(Request $request)
    {
        $verification = (bool)$this->verify($request);

        if(!$verification){
            return response()->json(['success' => false], 403);
        }

        $user = User::find(User::createOrUpdate($request));

        $orders = $request->post('order');

        foreach( $orders as $order){

            $owner = $user->vehicleOwner($order, $request->post('reference'));

            $owner->deliveryAddress($request->post('delivery'));

            foreach($order['products'] as $product ){
                $owner->createOrders($product);
            }

            CustomerReceiptEmail::withChain([new AdminNotifyEmail()])->dispatch($owner);
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
