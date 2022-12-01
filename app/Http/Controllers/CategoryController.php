<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate($request->total);

        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function getAdminCategories()
    {
        $categories = Category::get();

        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function getUserCategories()
    {
        $categories = Category::with('galleries')->get();

        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $slug = slugify($request->name);

        Category::create([
            'name' => $request->name,
            'slug' => $slug
        ]);

        return response()->json('success', 200);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        $category = Category::find($request->id);

        $category->name = $request->name;

        $category->save();

        return response()->json('success', 200);
    }

    public function destroy(Category $category, $id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
