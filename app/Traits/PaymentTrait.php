<?php
namespace App\Traits;

use GuzzleHttp\Client;
use Exception;
use App\Models\Product;
use App\Models\Charge;
use App\Models\Lga;
use App\Rave\Rave;

trait PaymentTrait{


    // public function verify($request)
    // {

    //     try{

    //         $client = new Client([
    //           'headers' => ['Authorization' => 'Bearer '. config('app.paystack_skey')]
    //         ]);

    //         $response = $client->request('GET', 'https://api.paystack.co/transaction/verify/'.$request->post('reference'));

    //         $amount = (int)$this->amount($request);

    //         $res = $response->getBody();

    //         $result = json_decode($res, true);

    //         if ( array_key_exists('data', $result) &&
    //             array_key_exists('status', $result['data']) &&
    //             ($result['data']['status'] === 'success') &&
    //             ($result['data']['amount'] === $amount * 100)) {

    //             return true;
    //         }else{
    //             return false;
    //         }
    //     } catch (\Exception $e) {
    //        //return  $e->getMessage();
    //        return false;
    //     }
    // }

    public function verify($request)
    {
      $txref = $request->post('reference');

      $data = Rave::verifyTransaction($txref);

      $chargeResponsecode = $data->data->chargecode;
      $chargeAmount = $data->data->amount;
      $chargeCurrency = $data->data->currency;

      $amount = (int)$this->amount($request);;
      $currency = "NGN";
      if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
      // transaction was successful...
      // please check other things like whether you already gave value for this ref
      // if the email matches the customer who owns the product etc
      //Give Value and return to Success page

          return true;

      } else {
          //Dont Give Value and return to Failure page
          return false;
      }
    }

    private function amount($request): int
    {

        $tfare = $this->deliveryFee($request);

        $service_charge_total = $this->serviceCharge($request);

        $products_sum = $this->productsTotal($request);

        $total = $products_sum + $service_charge_total + $tfare;

        return (int)$total;
    }

    private function deliveryFee($request): int
    {
        $delivery = $request->post('delivery');

        $lga = Lga::find($delivery['lga']);

        return (int)$lga->state->price;
    }

    private function productsTotal($request): int
    {
        $orders = $request->post('order');

        $sum = 0;

        foreach( $orders as $order){

            foreach($order['products'] as $product ){
                $product = Product::find($product['id'], ['price']);
                $sum += $product->price;
            }
        }
        return (int)$sum;
    }


    private function serviceCharge($request): int
    {
        $orders = $request->post('order');

        try{
            $result = Charge::first();
            $total = count($orders) * $result->charge;
            return (int)$total;
        } catch (\Exception $e) {
            return 0;
        }

    }
}
