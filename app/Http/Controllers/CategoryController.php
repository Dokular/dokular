<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get()
    {
        return response()->json(['data' => Category::with("products")->get()]);
    }

    public function create(Request $request)
    {
        $category = new Category();

        $category->name = $request->post('name');
        $category->description = $request->post('description');
        $category->img = 'img';
        $category->save();
    }
}
