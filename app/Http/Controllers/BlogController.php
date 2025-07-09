<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\News;
use App\Models\Cities;
use App\Models\Country;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        return redirect()->route('blog.show')->with('success', 'Blog created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $blogs = Blog::paginate(5);
        return view('dashboard.blogs.show', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $countries = Country::all();
        $cities = Cities::all();
        $categories = Categories::all();
        $blog = Blog::findOrFail($id);
        return view('dashboard.blogs.edit', compact('blog', 'countries', 'cities', 'categories'));
    }

    // Blog View
    public function view(string $id)
    {
        $blogs = Blog::findOrFail($id);
        return view('dashboard.blogs.view', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $validatedData = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'country_id' => 'nullable|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            'blog_title' => 'required|string|max:255',
            'blog_description' => 'required|string',
            'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'blog_status' => 'required|in:active,inactive',
            'blog_slug' => 'required|string|max:255',
            'blog_content' => 'required|string',
        ]);
        if ($request->hasFile('blog_image')) {
            // Delete the old image if it exists
            if ($blog->blog_image) 
            { $oldImagePath = public_path('Blogs/blog_images/' . $blog->blog_image);
                if (File::exists($oldImagePath)) { 
                    File::delete($oldImagePath); 
                }
            }

            // Upload the new image
            $image = $request->file('blog_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Blogs/blog_images'), $imageName);

            // Add the new image name to the validated data to be saved
            $validatedData['blog_image'] = $imageName;
        } else {
            // If no new image is uploaded, retain the old image path in case it exists
            // This prevents the 'blog_image' field from being set to null if no new file is selected
            $validatedData['blog_image'] = $blog->blog_image;
        }

        $blog->update($validatedData);

        return redirect()->route('blog.show')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $blog = Blog::findOrFail($id);
        // Delete the blog image if it exists
        if ($blog->blog_image && File::exists(public_path('Blogs/blog_images/' . $blog->blog_image))) {
            File::delete(public_path('Blogs/blog_images/' . $blog->blog_image));
        }
        $blog->delete();
        return redirect()->route('blog.show')->with('success', 'Blog deleted successfully.');
    }
}
