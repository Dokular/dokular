<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function get()
    {
        return CategoryResource::collection(Category::all()->load('products'));
        //return response()->json(['data' => Category::with("products")->get()]);
    }

    public function create(Request $request)
    {
        //return response()->json($request);
        $category = new Category();

        $category->name = $request->post('name');
        $category->description = $request->post('description');
        $category->img = 'img';
        $category->save();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $category->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return response()->json(['success' => true], 200);
    }

    public function getCategory(Category $id)
    {
        return response()->json(['data' => $id->load('products')], 200);
    }
}
