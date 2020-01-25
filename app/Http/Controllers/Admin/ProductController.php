<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function get()
    {
        return response()->json(['data' => Product::all()]);
    }

    public function create(Category $category, Request $request)
    {
        $category->products()->create([
            'name' => $request->post('name'),
            'price' => $request->post('price'),
            'img' => 'url'
        ]);
        return response()->json(['success' => true], 200);
    }

    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->input('product.name'),
            'price' => $request->input('product.price')
        ]);
        return response()->json(['success' => true], 200);
    }
}
