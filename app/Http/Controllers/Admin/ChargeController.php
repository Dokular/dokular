<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Charge;

class ChargeController extends Controller
{
    public function get()
    {
        try{
            return Charge::first();
        }catch (\Exception $e) {
            return response()->json(['charge' => 0]);
        }
    }

    public function update(Request $request)
    {
        Charge::updateOrCreate(
            ['id' => 1],
            [ 'charge' => $request->input('charge'),]
        );

        return response()->json(['success' => true], 200);
    }
}
