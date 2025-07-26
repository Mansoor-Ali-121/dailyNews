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
        // Set locale from URL segment
        $locale = request()->segment(1);
        if (in_array($locale, ['ur', 'en'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('en');
        }

        $locale = App::getLocale();

        // 🔴 Breaking News (Top 4)
        view()->share('livebreakingnews', BreakingNews::where('breakingnews_status', 'active')
            ->where('language', $locale)
            ->latest()
            ->take(4)
            ->get());

        // 🔴 Single Latest Breaking News
        view()->share('singleLatestBreakingNews', BreakingNews::where('breakingnews_status', 'active')
            ->where('language', $locale)
            ->latest()
            ->first());

        // 🔴 Second Latest Breaking News
        $secondLatestBreakingNews = BreakingNews::where('breakingnews_status', 'active')
            ->where('language', $locale)
            ->latest()
            ->skip(1)
            ->first();
        view()->share('secondLatestBreakingNews', $secondLatestBreakingNews);

        // ✅ All categories for navbar (filtered by language)
        view()->share('allcategories', Categories::where('language', $locale)->get());

        // 🟢 Politics News
        $politicsnews = News::where('news_status', 'active')
            ->where('language', $locale)
            ->whereHas('category', function ($query) use ($locale) {
                $query->where('category_name', $locale === 'ur' ? 'سیاست' : 'Politics');
            })
            ->latest()
            ->take(4)
            ->get();
        view()->share('politicsnews', $politicsnews);

        // 🟢 Sports News
        $sportsnews = News::where('news_status', 'active')
            ->where('language', $locale)
            ->whereHas('category', function ($query) use ($locale) {
                $query->where('category_name', $locale === 'ur' ? 'کھیل' : 'Sports');
            })
            ->latest()
            ->take(4)
            ->get();
        view()->share('sportsnews', $sportsnews);

        // 🟢 Entertainment News
        $entertainmentnews = News::where('news_status', 'active')
            ->where('language', $locale)
            ->whereHas('category', function ($query) use ($locale) {
                $query->where('category_name', $locale === 'ur' ? 'تفریح' : 'Entertainment');
            })
            ->latest()
            ->take(4)
            ->get();
        view()->share('entertainmentnews', $entertainmentnews);

        // 🟢 World News
        $worldnews = News::where('news_status', 'active')
            ->where('language', $locale)
            ->whereHas('category', function ($query) use ($locale) {
                $query->where('category_name', $locale === 'ur' ? 'دنیا' : 'World');
            })
            ->latest()
            ->take(4)
            ->get();
        view()->share('worldnews', $worldnews);

        // 📌 Latest 4 news per category
        $latestnavnews = Categories::with(['posts' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])
            ->where('language', $locale)
            ->latest()
            ->take(4)
            ->get();

        // 📌 Latest 4 general news
        $latestFourNews = News::where('language', $locale)
            ->latest()
            ->take(4)
            ->get();

        // 🟨 Share to all views
        View::share([
            'latestnavnews' => $latestnavnews,
            'latestFourNews' => $latestFourNews,
            'locale' => $locale,
        ]);

        Route::middleware('web')->group(base_path('routes/web.php'));
    }
}
