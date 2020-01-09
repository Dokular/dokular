<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function get()
    {
        return CategoryResource::collection(Category::all()->load('products'));
    }
}
