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
        //return response()->json(['data' => Product::all()]);
        return ProductResource::collection(Product::all());
    }

    public function create($id, Request $request)
    {
        $products = new Product([
            'name' => $request->post('name'),
            'price' => $request->post('price'),
            'img' => 'url'
        ]);

        $category = Category::find($id);

        $category->products()->save($products);
    }
}
