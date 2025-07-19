<?php

namespace App\Providers;

use App\Models\News;
use App\Models\Categories;
use App\Models\BreakingNews;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // live breaking news variable for top crousel in webtemp
        view()->share('livebreakingnews', BreakingNews::where('breakingnews_status', 'active')->latest()->take(4)->get());
        // live breaking news variable for single latest breaking news homepage section 2 
        view()->share('singleLatestBreakingNews', BreakingNews::where('breakingnews_status', 'active')->latest()->first());

        // live breaking news variable for single latest breaking news homepage section 2 
        $secondLatestBreakingNews = BreakingNews::where('breakingnews_status', 'active')
            ->latest()
            ->skip(1) // Skip the first (latest) result
            ->first(); // Get the next (second latest) result
        view()->share('secondLatestBreakingNews', $secondLatestBreakingNews);

        // All news categories in navbar 
        view()->share('allcategories', Categories::all());
        // Latest category name in navbar
        // view()->share('latestcategory', Categories::withCount('news')->orderBy('news_count', 'desc')->first());
        // Latest news in navbar with category name
        // view()->share('newsItems', News::with('category')->where('news_status', 'active')->latest()->take(4)->get());

        // Politics news fetching code start
        $politicsnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Politics'); // Ensure 'category_name' is correct
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();

        view()->share('politicsnews', $politicsnews);
        // Politics news fetching code end

        // Sports news fetching code start
        $sportsnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Sports'); // Ensure 'category_name' is correct
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();

        view()->share('sportsnews', $sportsnews);
        // Politics news fetching code end

        // Entertainment news fetching code start
        $entertainmentnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'Entertainment'); // Ensure 'category_name' is correct
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();

        view()->share('entertainmentnews', $entertainmentnews);
        // Entertainment news fetching code end

        // Media news fetching code start
        $worldnews = News::whereHas('category', function ($query) {
            $query->where('category_name', 'World'); // Ensure 'category_name' is correct
        })
            ->where('news_status', 'active') // Only active news
            ->latest() // Get the latest ones
            ->take(4) // Limit to 4 articles
            ->get();

        view()->share('worldnews', $worldnews);
        // Media news fetching code end

        // Latest news fetching code start
     $latestnavnews = Categories::with('posts')->latest()->take(4)->get();
    $latestFourNews = News::latest()->take(4)->get();

    View::share([
        'latestnavnews' => $latestnavnews,
        'latestFourNews' => $latestFourNews,
    ]);
        // Latest news fetching code end


// Set the locale based on the request for urdu or english

       // Locale based on first URL segment
        $locale = request()->segment(1);
        if (in_array($locale, ['ur', 'en'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('en');
        }

        Route::middleware('web')
            ->group(base_path('routes/web.php'));
        // Share the locale with all views
        View::share('locale', App::getLocale());
    }
}
