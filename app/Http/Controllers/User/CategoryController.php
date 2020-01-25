<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function get()
    {
        return CategoryResource::collection(Category::with('products')->active()->get());
    }
}
