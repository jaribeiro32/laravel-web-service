<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $categories = $category->getResults($request->name);

        return response()->json($categories, 200);
    }
}
