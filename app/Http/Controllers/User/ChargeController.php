<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Charge;

class ChargeController extends Controller
{
    public function serviceCharge()
    {
        return Charge::first();
    }
}
