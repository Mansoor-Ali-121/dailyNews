<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\BreakingNews;
use App\Models\Categories;
use App\Models\Blog;
use App\Models\liveVideos;

class UrduWebController extends Controller
{
    public function index()
    {
        $breakingNews = BreakingNews::where('breakingnews_status', 'active')
            ->where('language', 'ur')
            ->latest('id')
            ->get();

        $activeNews = BreakingNews::where('breakingnews_status', 'active')
            ->where('language', 'ur')
            ->latest('id')
            ->take(4)
            ->get();

        $news = News::where('news_status', 'active')
            ->where('language', 'ur')
            ->latest('id')
            ->get();

        $categories = Categories::withCount(['news' => function ($query) {
            $query->where('language', 'ur');
        }])->get();

        $sportsCategory = Categories::where('category_name', 'کھیل')->first();

        $sportsNews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'کھیل');
        })
            ->where('news_status', 'active')
            ->latest()
            ->take(4)
            ->get();

        $entertainmentnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'تفریح'); 
        })
            ->where('news_status', 'active')
            ->where('language', 'ur')
            ->latest()
            ->take(4)
            ->get();

        $businessnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'کاروبار');
        })
            ->where('news_status', 'active')
            ->where('language', 'ur')
            ->latest()
            ->take(4)
            ->get();

        $autonews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'آٹو');
        })
            ->where('news_status', 'active')
            ->where('language', 'ur')
            ->latest()
            ->take(4)
            ->get();

        $politicsnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'سیاست');
        })
            ->where('news_status', 'active')
            ->where('language', 'ur')
            ->latest()
            ->take(4)
            ->get();

        $worldnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'دنیا');
        })
            ->where('news_status', 'active')
            ->where('language', 'ur')
            ->latest()
            ->take(4)
            ->get();

        $healthnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'صحت');
        })
            ->where('news_status', 'active')
            ->where('language', 'ur')
            ->latest()
            ->take(4)
            ->get();

        $livevideos = liveVideos::where('video_status', 'active')
            ->where('language', 'ur')
            ->latest()
            ->take(4)
            ->get();

        $blogs = Blog::where('blog_status', 'active')
            ->where('language', 'ur')
            ->latest()
            ->take(4)
            ->get();

        return view('front.homepage', compact(
            'news',
            'breakingNews',
            'activeNews',
            'categories',
            'sportsNews',
            'sportsCategory',
            'businessnews',
            'autonews',
            'entertainmentnews',
            'politicsnews',
            'worldnews',
            'healthnews',
            'livevideos',
            'blogs'
        ));
    }

    public function singlecategoryview($slug)
    {
        // Get the Urdu category by slug and language
        $category = Categories::where('category_slug', $slug)
            ->where('language', 'ur') // Ensure category is also Urdu
            ->firstOrFail();

        // Get the Urdu category name
        $categoryname = $category->category_name;

        // Count total Urdu news (optional)
        $totalNewsCount = News::where('language', 'ur')->count();

        // Fetch Urdu news for this category only
        $news = News::where('category_id', $category->id)
            ->where('language', 'ur')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('front.singlecategory', compact('news', 'categoryname', 'totalNewsCount'));
    }


    public function showsinglenews(string $slug)
    {
        // Urdu categories
        $categories = Categories::withCount('news')
        ->where('language', 'ur')
        ->get();

        // Show single Urdu news
        $news = News::with('author')->where([
            ['news_slug', '=', $slug],
            ['news_status', '=', 'active'],
            ['language', '=', 'ur'], // <-- Sirf Urdu news fetch hogi
        ])->firstOrFail();

        // Latest Urdu news
        $latestnews = News::where([
            ['news_status', '=', 'active'],
            ['language', '=', 'ur'],
        ])->latest()->take(4)->get();

        // Related Urdu news
        $relatedNews = News::where([
            ['news_status', '=', 'active'],
            ['language', '=', 'ur'],
            ['category_id', '=', $news->category_id],
            ['id', '!=', $news->id],
        ])->latest()->take(3)->get();

        $currentCategoryId = $news->category_id;

        // Previous Urdu post
        $previousPost = News::where([
            ['news_status', '=', 'active'],
            ['language', '=', 'ur'],
            ['category_id', '=', $currentCategoryId],
            ['id', '<', $news->id],
        ])->orderBy('id', 'desc')->first();

        // Next Urdu post
        $nextPost = News::where([
            ['news_status', '=', 'active'],
            ['language', '=', 'ur'],
            ['category_id', '=', $currentCategoryId],
            ['id', '>', $news->id],
        ])->orderBy('id', 'asc')->first();

        if ($news && $categories) {
            return view('front.singlenews', compact('news', 'categories', 'latestnews', 'relatedNews', 'previousPost', 'nextPost'));
        } else {
            return view('404');
        }
    }

     public function singleblog(string $slug)
    {
        // Show single Urdu blog with slug
        $blog = Blog::with('author')->where([
            ['blog_slug', '=', $slug],
            ['blog_status', '=', 'active'],
            ['language', '=', 'ur'] 
        ])->firstOrFail();

        // Show related Urdu news
        $relatedNews = News::where('news_status', 'active')
            ->where('language', 'ur') 
            ->where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        // Categories in Urdu
        $categories = Categories::withCount(['news' => function ($query) {

        }])->get()->where('language', 'ur'); 

        // Latest Urdu news
        $latestnews = News::where('news_status', 'active')
            ->where('language', 'ur')
            ->latest()
            ->take(4)
            ->get();

        // Previous and next Urdu blog
        $previousPost = Blog::where('id', '<', $blog->id)
            ->where('language', 'ur')
            ->orderBy('id', 'desc')
            ->first();

        $nextPost = Blog::where('id', '>', $blog->id)
            ->where('language', 'ur')
            ->orderBy('id', 'asc')
            ->first();

        return view('front.singleblog', compact(
            'blog',
            'relatedNews',
            'categories',
            'latestnews',
            'previousPost',
            'nextPost'
        ));
    }

       public function showsinglebreakingnews(string $slug)
    {
        // Categories for news shows
        $categories = Categories::withCount('news')
        ->where('language', 'ur')
        ->get();
        // $latestnews = News::where('news_status', 'active')->latest()->take(4)->get();
        $breakingnews = BreakingNews::where([
            ['breakingnews_slug', '=', $slug],
            ['breakingnews_status', '=', 'active']
        ])->firstOrFail();

        // Recent breaking news 
        $relatedNews = BreakingNews::where('breakingnews_status', 'active')
            ->where('id', '!=', $breakingnews->id)
            ->where('language', 'ur')
            ->latest()
            ->take(5)
            ->get();

        // previos and next breaking news
        $previousPost = BreakingNews::where('id', '<', $breakingnews->id)->orderBy('id', 'desc')
        ->where('language', 'ur')
        ->first();
        $nextPost  = BreakingNews::where('id', '>', $breakingnews->id)->orderBy('id', 'asc')
        ->where('language', 'ur')
        ->first();

        return view('front.singlebreakingnews', compact('breakingnews', 'relatedNews', 'categories', 'previousPost', 'nextPost'));

        // $authors = News::with('users')->get();
    }



}
