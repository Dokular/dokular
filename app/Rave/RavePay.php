<?php
namespace App\Rave;

use Illuminate\Support\Facades\Log;
use Unirest\Request as UniRequest;
use Unirest\Request\Body;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class RavePay{

    protected $secretKey;
    protected $txref;
    protected $env = 'staging';
    protected $verifyCount = 0;
    protected $baseUrl;
    protected $body;
    protected $request;
    protected $urls = [
        "production" => "https://api.ravepay.co",
        "others" => "https://ravesandboxapi.flutterwave.com",
    ];


    public function __construct(Request $request, UniRequest $unirestRequest, Body $body)
    {
        $this->request = $request;
        $this->body = $body;
        $this->unirestRequest = $unirestRequest;
        $this->secretKey = Config::get('rave.secretKey');
        $this->env = Config::get('rave.env');

        $this->baseUrl = $this->urls[($this->env === "production" ? "$this->env" : "others")];

    }

    /**
     * Verifies a transaction with the transaction reference
     * @param string $referenceNumber This should be the reference number of the transaction you want to verify
     * @return object
     * */
    public function verifyTransaction($referenceNumber)
    {
        $this->txref = $referenceNumber;
        $this->verifyCount++;
        Log::notice('Verifying Transaction....' . $this->txref);

        $data = array(
            'txref' => $this->txref,
            'SECKEY' => $this->secretKey,
            'last_attempt' => '1'
            // 'only_successful' => '1'
        );

        // make request to endpoint using unirest.
        $headers = array('Content-Type' => 'application/json');
        $body = $this->body->json($data);
        $url = $this->baseUrl . '/flwv3-pug/getpaidx/api/v2/verify';

        // Make `POST` request and handle response with unirest
        $response = $this->unirestRequest->post($url, $headers, $body);

        //check the status is success
        if ($response->body && $response->body->status === "success") {
            return $response->body;
        } else {
            if ($this->verifyCount > 4) {
                $this->paymentCanceled($this->txref, $response->body);
            } else {
                sleep(3);
                $this->verifyTransaction($this->txref);
            }
        }
    }

    public function paymentCanceled($referenceNumber, $data = null)
    {
        $this->txref = $referenceNumber;
        if ($this->request->cancelled) {
            $cancelledResponse = '{"status": "cancelled" , "message": "Customer cancelled the transaction", "data":{ "status": "cancelled", "txRef" :"' . $this->txref . '"}}';
            $resp = json_decode($cancelledResponse);
            return $resp;
        }
        return $data;
    }
}
