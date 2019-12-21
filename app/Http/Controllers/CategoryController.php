<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get()
    {
        return response()->json(['data' => Category::with("products")->get()]);
    }
}
