<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Categories;
use App\Models\BreakingNews;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     
     */
    public function index()
    {

        // Breaking News Start top crousel
        $breakingNews = BreakingNews::all()->where('breakingnews_status', 'active');


        $livebreakingnews = BreakingNews::where('breakingnews_status', 'active')->latest()->take(4)->get();
        // dd($livebreakingnews);

        // Crousel Breaking news section 2 home page
        $activeNews = BreakingNews::where('breakingnews_status', 'active')
            ->latest()
            ->take(4)
            ->get();
        // Crousel

        // Active news
        $news = News::all()->where('news_status', 'active');




        // Single Category with only four news if category name politics then show only politics news
        $categories = Categories::withCount('news')->get();

        // $news = News::where('news_status', 'active')->latest()->take(4)->get();

        // --- This is the new part: Get 4 active news from the 'Politics' category ---
        $sportsNews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Sports'); // Ensure 'category_name' is the correct column and 'Politics' is spelled exactly as in your DB
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();


        /*media news fetching code start*/
        $entertainmentnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Entertainment'); // Ensure 'category_name' is the correct column and 'Politics' is spelled exactly as in your DB
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();
        /*media news fetching code end*/

        // Business news fetching code start
        $businessnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Business'); // Ensure 'category_name' is the correct column and 'Politics' is spelled exactly as in your DB
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();
        // Business news fetching code end

        // Auto news fetching code start
        $autonews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Auto'); // Ensure 'category_name' is the correct column and 'Politics' is spelled exactly as in your DB
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();
        // Auto news fetching code end

        return view('front.homepage', compact('news', 'livebreakingnews', 'breakingNews', 'activeNews', 'categories', 'sportsNews', 'businessnews', 'autonews', 'entertainmentnews'));
    }




    public function showsinglenews(string $slug)
    {
        // show categories in single news

        $categories = Categories::withCount('news')->get();
        // show single news
        $news = News::with('author')->where([
            ['news_slug', '=', $slug],
            ['news_status', '=', 'active']
        ])->firstOrFail();
        $latestnews = News::where('news_status', 'active')->latest()->take(4)->get();

        // show related news
        $relatedNews = News::where('news_status', 'active')
            ->where('category_id', $news->category_id) // <--- Filter by current news's category
            ->where('id', '!=', $news->id)           // <--- Exclude the current news article itself
            ->latest()                               // Order by latest (you can change this to random() if preferred)
            ->take(4)                                // Limit to 4 related articles as per your layout's structure
            ->get();


        if ($news && $categories) {
            return view('front.singlenews', compact('news', 'categories', 'latestnews', 'relatedNews'));
        } else {
            return view('404');
        }
        // $authors = News::with('users')->get();
    }

    public function showsinglebreakingnews(string $slug)
    {

        $categories = Categories::withCount('news')->get();
        // $latestnews = News::where('news_status', 'active')->latest()->take(4)->get();
        $breakingnews = BreakingNews::where([
            ['breakingnews_slug', '=', $slug],
            ['breakingnews_status', '=', 'active']
        ])->firstOrFail();
        // Recent 
        $latestnews = News::where('news_status', 'active')->latest()->take(4)->get();


        return view('front.singlebreakingnews', compact('breakingnews', 'latestnews', 'categories'));

        // $authors = News::with('users')->get();
    }

    // View of single news
    public function view()
    {
        return view('front.singlenews');
    }

    // View of single Category

    /*************  ✨ Windsurf Command ⭐  *************/
    /*******  6a9da2f4-73da-44e1-b2a3-cd7853eece3d  *******/
    public function singlecategoryview($slug)
    {

        $livebreakingnews = BreakingNews::where('breakingnews_status', 'active');
        $category = Categories::where('category_slug', $slug)->firstOrFail();
        $categoryname = $category->category_name;
        $totalNewsCount = News::count();
        $news = News::where('category_id', $category->id)->get();

        return view('front.singlecategory', compact('news', 'categoryname', 'totalNewsCount', 'livebreakingnews'));
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
