<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Owner;

class OrderController extends Controller
{
    public function all(Request $request)
    {
        $order = Owner::where('status', $request->query('BY'))
                      ->with('orders.product','delivery','user')->get();
        return response()->json(['success' => true, $order]);
    }

    public function get()
    {
        // return response()->json(['success' => true]);
        $orders = Owner::with('orders.product','delivery','user')->get();
        return response()->json(['success' => true, $orders]);
    }

    public function updateStatus(Request $request,Owner $owner)
    {

        $owner->update(['status' => $request->input('status')]);
        return response()->json(['success' => true], 200);

    }
}
