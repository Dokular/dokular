<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Charge;

class ChargeController extends Controller
{
    public function serviceCharge()
    {
        $charge = Charge::all();
        return response()->json(['message' => 'service charge', 'data' => $charge[0]], 200);
    }
}
