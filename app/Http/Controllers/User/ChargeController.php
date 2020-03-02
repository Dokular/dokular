<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Charge;

class ChargeController extends Controller
{
    public function serviceCharge()
    {
        try{
            return Charge::first();
        }catch (\Exception $e) {
            return response()->json(['charge' => 0]);
        }

    }
}
