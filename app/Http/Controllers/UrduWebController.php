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
        ->get();

    $activeNews = BreakingNews::where('breakingnews_status', 'active')
        ->where('language', 'ur')
        ->latest()
        ->take(4)
        ->get();

    $news = News::where('news_status', 'active')
        ->where('language', 'ur')
        ->get();

    $categories = Categories::withCount(['news' => function ($query) {
        $query->where('language', 'ur');
    }])->get();

    $sportsNews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Sports');
        })
        ->where('news_status', 'active')
        ->where('language', 'ur')
        ->latest()
        ->take(4)
        ->get();

    $entertainmentnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Entertainment');
        })
        ->where('news_status', 'active')
        ->where('language', 'ur')
        ->latest()
        ->take(4)
        ->get();

    $businessnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Business');
        })
        ->where('news_status', 'active')
        ->where('language', 'ur')
        ->latest()
        ->take(4)
        ->get();

    $autonews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Auto');
        })
        ->where('news_status', 'active')
        ->where('language', 'ur')
        ->latest()
        ->take(4)
        ->get();

    $politicsnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Politics');
        })
        ->where('news_status', 'active')
        ->where('language', 'ur')
        ->latest()
        ->take(4)
        ->get();

    $worldnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'World');
        })
        ->where('news_status', 'active')
        ->where('language', 'ur')
        ->latest()
        ->take(4)
        ->get();

    $healthnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Health');
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

}
