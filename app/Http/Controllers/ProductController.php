<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function get()
    {
        return response()->json(['data' => Product::all()]);
    }
}
