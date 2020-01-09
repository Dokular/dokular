<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function get()
    {
        return ProductResource::collection(Product::all());
    }
}
