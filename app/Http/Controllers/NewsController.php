<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Cities;
use App\Models\Country;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
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

        return view('dashboard.news.add', compact('categories', 'countries', 'cities'));
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
        // dd($request->all());

        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'news_status' => ['required', 'in:active,inactive'],
            'news_content' => ['required', 'string'],
            'news_slug' => ['nullable', 'string', 'max:255'],
            'news_title' => ['required', 'string', 'max:255'],
            'news_description' => ['required', 'string'],
            'news_image' => 'required|image|mimes:jpeg,png,webp,gif|max:5120',
            'category_id' => 'required|exists:categories,id',
            'city_id' => 'required|exists:cities,id',
        ]);
        // file upload
        if ($request->hasFile('news_image')) {
            $image = $request->file('news_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('news/news_images'), $imageName);
            $validatedData['news_image'] = $imageName;
        }

          if (Auth::check()) {
            $validatedData['author_id'] = Auth::id(); // Add the logged-in user's ID
        } else {
            $validatedData['author_id'] = null; // Set to null if allowed by DB schema
        }
        // Save the validated data to the database
        $news = News::create($validatedData);
        // dd($news);
        return redirect()->route('news.show')->with('success', 'News added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $news = News::paginate(10);
        return view('dashboard.news.show', compact('news'));
    }
    public function view(string $id)
    {
        $news = News::findOrFail($id);
        return view('dashboard.news.view', compact('news'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        $countries = Country::all();
        $categories = Categories::all();
        $cities = Cities::all();
        return view('dashboard.news.edit', compact('news', 'countries', 'categories', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
   
    public function update(Request $request, string $id)
    {
        // 1. Find the existing news item FIRST
        $news = News::findOrFail($id);

        // 2. Validate the incoming request data
        //    (Your validation rules are correct as 'nullable' for news_image)
        $validatedData = $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'news_status' => ['required', 'in:active,inactive'],
            'news_content' => ['required', 'string'],
            'news_slug' => ['nullable', 'string', 'max:255'],
            'news_title' => ['required', 'string', 'max:255'],
            'news_description' => ['required', 'string', 'max:255'],
            'news_image' => 'nullable|image|mimes:jpeg,png,webp,gif|max:5120', // This is correct
            'category_id' => 'required|exists:categories,id',
            'city_id' => 'required|exists:cities,id',
        ]);

        if ($request->hasFile('news_image')) {

            // Delete the OLD image ONLY if it exists and a NEW one is provided
            if ($news->news_image && File::exists(public_path('news/news_images/' . $news->news_image))) {
                File::delete(public_path('news/news_images/' . $news->news_image));
            }

            // Save the NEW image
            $image = $request->file('news_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('news/news_images'), $imageName);
            $validatedData['news_image'] = $imageName; 
        } else {
            // No new image was uploaded.
            unset($validatedData['news_image']);
        }

        // 4. Update the News record with the processed data
        $news->update($validatedData);

        return redirect()->route('news.show')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        // Delete the news image if it exists
        if ($news->news_image && File::exists(public_path('news/news_images/' . $news->news_image))) {
            File::delete(public_path('news/news_images/' . $news->news_image));
        }
        $news->delete();
        return redirect()->route('news.show')->with('success', 'News deleted successfully');
    }
}
