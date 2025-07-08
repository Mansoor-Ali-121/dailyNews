<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\News;
use App\Models\Cities;
use App\Models\Country;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Fetch all categories
        $categories = Categories::all();

        // Fetch all countries
        $countries = Country::all();

        // Fetch all cities
        $cities = Cities::all();
        return view('dashboard.blogs.add', compact('categories', 'countries', 'cities'));
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'country_id' => 'nullable|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            'blog_title' => 'required|string|max:255',
            'blog_description' => 'required|string',
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'blog_status' => 'required|in:active,inactive',
            'blog_slug' => 'required|string|max:255',
            'blog_content' => 'required|string',
        ]);
          // file upload
        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Blogs/blog_images'), $imageName);
            $validatedData['blog_image'] = $imageName;
        }

          if (Auth::check()) {
            $validatedData['author_id'] = Auth::id(); // Add the logged-in user's ID
        } else {
            $validatedData['author_id'] = null; // Set to null if allowed by DB schema
        }
        // Save the validated data to the database
        $blogs = Blog::create($validatedData);
        return redirect()->route('blog.add')->with('success', 'Blog created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $blogs = Blog::all();
        return view('dashboard.blogs.show', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
