<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Categories;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Crousel
        $activeNews = News::where('news_status', 'active')
            ->latest()
            ->take(4)
            ->get();
        // Crousel

        // top crousel
        $news = News::all()->where('news_status', 'active');
        // top crousel

        // Single Category with only four news if category name politics then show only politics news
        $categories = Categories::withCount('news')->get();

        // $news = News::where('news_status', 'active')->latest()->take(4)->get();

        // --- This is the new part: Get 4 active news from the 'Politics' category ---
        $politicsNews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Politics'); // Ensure 'category_name' is the correct column and 'Politics' is spelled exactly as in your DB
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();




        /*media news fetching code start*/
        $medianews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Media'); // Ensure 'category_name' is the correct column and 'Politics' is spelled exactly as in your DB
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();
        /*media news fetching code end*/

        return view('front.homepage', compact('news', 'activeNews', 'categories', 'politicsNews','medianews'));
    }




    public function showsinglenews(string $slug)
    {
        // show categories in single news
        $categories = Categories::withCount('news')->get();
        // show single news
        $news = News::with('author')->where([ // <--- THIS IS THE CRITICAL CORRECTION
            ['news_slug', '=', $slug],
            ['news_status', '=', 'active']
        ])->firstOrFail();
        $latestnews = News::where('news_status', 'active')->latest()->take(4)->get();

        $relatedNews = News::where('news_status', 'active')
            ->where('category_id', $news->category_id) // <--- Filter by current news's category
            ->where('id', '!=', $news->id)           // <--- Exclude the current news article itself
            ->latest()                               // Order by latest (you can change this to random() if preferred)
            ->take(3)                                // Limit to 4 related articles as per your layout's structure
            ->get();


        if ($news && $categories) {
            return view('front.singlenews', compact('news', 'categories', 'latestnews', 'relatedNews'));
        } else {
            return view('404');
        }
        // $authors = News::with('users')->get();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function view()
    {
        return view('front.singlenews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function shownews(Request $request)
    {
        $news = News::all();
        return view('front.homepage', compact('news'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
