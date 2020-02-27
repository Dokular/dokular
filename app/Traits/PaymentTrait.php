<?php
namespace App\Traits;

use GuzzleHttp\Client;
use Exception;
use App\Models\Product;
use App\Models\State;

trait PaymentTrait{


    public function verify($request)
    {

        try{

            $client = new Client([
              'headers' => ['Authorization' => 'Bearer '. config('app.paystack_skey')]
            ]);

            $response = $client->request('GET', 'https://api.paystack.co/transaction/verify/'.$request->post('reference'));

            $amount = $this->amount($request);

            $res = $response->getBody();

            $result = json_decode($res, true);

            if ( array_key_exists('data', $result) &&
                array_key_exists('status', $result['data']) &&
                ($result['data']['status'] == 'success') &&
                ($result['data']['amount'] == $amount * 100)) {

                return true;
            }

            return false;

        } catch (\Exception $e) {
           return  $e->getMessage();
        }
    }

    public function amount($request)
    {
        $orders = $request->post('order');

        $sum = 0;

        foreach( $orders as $order){

            foreach($order['products'] as $product ){
                $product = Product::find($product['id'], ['price']);
                $sum += $product->price;
            }

        }
        $getState = $request->post('delivery');

        $tfare = State::where('name', $getState['state']['name'])->get(['price']);

        $total = $sum + $tfare[0]->price;

        return $total;
    }
}
