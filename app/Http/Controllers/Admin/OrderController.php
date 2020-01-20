<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;

class OrderController extends Controller
{
    public function all()
    {
        $order = Owner::all()->load('orders');
        return response()->json(['success' => true, $order]);
    }
}
