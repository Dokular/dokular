<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use JD\Cloudder\Facades\Cloudder;

class CategoryController extends Controller
{
    public function get()
    {
       return response()->json(['data' => Category::with("products")->get()]);
    }

    public function getCategory(Category $category)
    {
        return response()->json(['data' => $category->load('products')], 200);
    }

    public function create(Request $request)
    {
        $category = new Category();

        if($request->hasFile('image') && $request->file('image')->isValid()){

            Cloudder::upload($request->file('image'));

            $category->name = $request->post('name');
            $category->description = $request->post('description');
            $category->img = Cloudder::getPublicId();
            $category->save();

            return response()->json(['success' => true], 200);
        }

    }

    public function active(Request $request, Category $category)
    {
        $validated =   $request->validate([
                        'active' => 'required|boolean'
                       ]);

        if($validated['active'] == true){

            $category->update(['active' => 0]);

            return response()->json(['success' => true], 200);
        }

        $category->update(['active' => 1]);

        return response()->json(['success' => true], 200);
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->input('category.name'),
            'description' => $request->input('category.description')
        ]);
        return response()->json(['success' => true], 200);
    }

    public function delete(Category $category)
    {
        $category->delete();
        return response()->json(['success' => true], 200);
    }

}
