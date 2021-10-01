<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        Category::create($data);

        return redirect()->back()->with('success', 'Successfully Category saved!');
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function edit(Category $category)
    {
        // $category = Category::where('id', $id)->firstOrFail();

        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        $category->update([
            'name' => $data['name'],
        ]);

        return redirect()->back()->with('success', 'Successfully Category updated!');
    }

    public function destroy(Category $category)
    {
        // $category = Category::where('id', $id)->firstOrFail();
        $category->delete();

        return redirect()->back()->with('success', 'Successfully Category deleted!');
    }
}
