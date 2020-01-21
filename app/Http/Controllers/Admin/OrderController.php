<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;

class OrderController extends Controller
{
    public function all(Request $request)
    {
        $order = Owner::where('status', $request->query('BY'))->with('orders')->get();
        return response()->json(['success' => true, $order]);
    }
}
