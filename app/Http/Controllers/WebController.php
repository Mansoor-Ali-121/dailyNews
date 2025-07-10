<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\News;
use App\Models\User;
use App\Models\Categories;
use App\Models\liveVideos;
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

        $politicsnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Politics'); // Ensure 'category_name' is correct
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();
        // Politics news fetching code end

        // World news fetching code start
        $worldnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'World'); // Ensure 'category_name' is the correct column and 'Politics' is spelled exactly as in your DB
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();
        // World news fetching code end

        // Health news fetching code start
        $healthnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Health'); // Ensure 'category_name' is the correct column and 'Politics' is spelled exactly as in your DB
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();
        // Health news fetching code end

        // Live videos fethcing code start
        $livevideos = liveVideos::where('video_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 videos
            ->get();
        // Live videos fetching code end

        // Blogs fethcing code start
        $blogs = Blog::where('blog_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 videos
            ->get();
        // Blogs fetching code end

        return view('front.homepage', compact('news', 'breakingNews', 'activeNews', 'categories', 'sportsNews', 'businessnews', 'autonews', 'entertainmentnews', 'politicsnews', 'worldnews', 'healthnews', 'livevideos', 'blogs'));
    }

    public function singleblog(string $slug)
    {

        // show single blog with slug
        $blog = Blog::with('author')->where([
            ['blog_slug', '=', $slug],
            ['blog_status', '=', 'active']
        ])->firstOrFail();

        // show related news
        $relatedNews = News::where('news_status', 'active')
            ->where('category_id', $blog->category_id) // <--- Filter by current blog's category
            ->where('id', '!=', $blog->id)           // <--- Exclude the current news article itself
            ->latest()                               // Order by latest (you can change this to random() if preferred)
            ->take(3)                                // Limit to 4 related articles as per your layout's structure
            ->get();

        // Categories
        $categories = Categories::withCount('news')->get();
        // recent news
        $latestnews = News::where('news_status', 'active')->latest()->take(4)->get();

        // previous and next blog
        $previousPost = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextPost  = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();

        return view('front.singleblog', compact('blog', 'relatedNews', 'categories', 'latestnews', 'previousPost', 'nextPost'));
    }


    public function showsinglenews(string $slug)
    {

        // live breaking news
        // $livebreakingnews = BreakingNews::where('breakingnews_status', 'active')->latest()->take(4)->get();

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
            ->take(3)                                // Limit to 4 related articles as per your layout's structure
            ->get();

        $currentCategoryId = $news->category_id;

        // Fetch the previous post within the SAME category
        $previousPost = News::where('news_status', 'active') // Ensure previous post is also active
            ->where('category_id', $currentCategoryId) // <-- ADDED: Filter by current news's category
            ->where('id', '<', $news->id)
            ->orderBy('id', 'desc')
            ->first();

        // Fetch the next post within the SAME category
        $nextPost = News::where('news_status', 'active') // Ensure next post is also active
            ->where('category_id', $currentCategoryId) // <-- ADDED: Filter by current news's category
            ->where('id', '>', $news->id)
            ->orderBy('id', 'asc')
            ->first();


        if ($news && $categories) {
            return view('front.singlenews', compact('news', 'categories', 'latestnews', 'relatedNews', 'previousPost', 'nextPost'));
        } else {
            return view('404');
        }
        // $authors = News::with('users')->get();
    }

    public function showsinglebreakingnews(string $slug)
    {
    // Categories for news shows
        $categories = Categories::withCount('news')->get();
        // $latestnews = News::where('news_status', 'active')->latest()->take(4)->get();
        $breakingnews = BreakingNews::where([
            ['breakingnews_slug', '=', $slug],
            ['breakingnews_status', '=', 'active']
        ])->firstOrFail();

        // Recent breaking news 
        $relatedNews = BreakingNews::where('breakingnews_status', 'active')
            ->where('id', '!=', $breakingnews->id)
            ->latest()                         
            ->take(5)                      
            ->get();

            // previos and next breaking news
            $previousPost = BreakingNews::where('id', '<', $breakingnews->id)->orderBy('id', 'desc')->first();
            $nextPost  = BreakingNews::where('id', '>', $breakingnews->id)->orderBy('id', 'asc')->first();

        return view('front.singlebreakingnews', compact('breakingnews', 'relatedNews', 'categories', 'previousPost', 'nextPost'));

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

        // $livebreakingnews = BreakingNews::where('breakingnews_status', 'active');
        $category = Categories::where('category_slug', $slug)->firstOrFail();
        $categoryname = $category->category_name;
        $totalNewsCount = News::count();
        $news = News::where('category_id', $category->id)
            ->orderBy('created_at', 'desc') // Good practice to order your results
            ->paginate(3);

        return view('front.singlecategory', compact('news', 'categoryname', 'totalNewsCount'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function shownews(Request $request)
    {
        // live breaking news
        // $livebreakingnews = BreakingNews::where('breakingnews_status', 'active')->latest()->take(4)->get();
        // end
        $news = News::all();
        return view('front.homepage', compact('news'));
    }

    /**
     * Display the specified resource.
     */
    public function showAuthorProfile($slug)
    {
                // Find the author by their slug
        $author = User::where('user_slug', $slug)->firstOrFail();
     
        $authorNews = $author->news()->latest()->paginate(3); // Get all, ordered by latest

        return view('front/singleAuthor', compact('author', 'authorNews'));

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
