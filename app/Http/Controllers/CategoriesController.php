<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
//   use Illuminate\Validation\Rule;

public function store(Request $request)
{
    $validated = $request->validate([
        'category_name' => 'required|string|max:255',
        'category_slug' => [
            'required',
            'string',
            'max:255',
            Rule::unique('categories')->where(function ($query) use ($request) {
                return $query->where('language', $request->language);
            }),
        ],
        'category_status' => 'required|string|in:active,inactive',
        'language' => 'required|in:ur,en',
    ]);

    Categories::create($validated);

    return redirect()->route('category.show')->with('success', 'Category added successfully');
}


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $categories = Categories::paginate(5);
        return view('dashboard.categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categories::find($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'category_slug' => 'required|string|max:255',
            'category_status' => 'required|string|in:active,inactive',
            'language'=> 'required|in:ur,en',

        ]);

        $category = Categories::findOrFail($id);
        $category->update($validated);
        return redirect()->route('category.show')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();
        return redirect()->route('category.show')->with('success', 'Category deleted successfully');
    }
}
