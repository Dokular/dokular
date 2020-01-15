<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use JD\Cloudder\Facades\Cloudder;

class CategoryController extends Controller
{
    public function get()
    {
       return response()->json(['data' => Category::with("products")->get()]);
    }

    public function getCategory(Category $id)
    {
        return response()->json(['data' => $id->load('products')], 200);
    }

    public function create(Request $request)
    {
        $category = new Category();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            //$category->addMediaFromRequest('image')->toMediaCollection('images');

            Cloudder::upload($request->file('image'), null, [],[]);

            $category->name = $request->post('name');
            $category->description = $request->post('description');
            $category->img = Cloudder::getPublicId();
            $category->save();

            return response()->json(['success' => true], 200);
        }

    }

}
