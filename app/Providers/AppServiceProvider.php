<?php

namespace App\Providers;

use App\Models\News;
use App\Models\About;
use App\Models\Terms;
use App\Models\Categories;
use App\Models\BreakingNews;
use App\Models\PrivacyPolicy;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void { }

    public function boot(): void
    {
        // 1. Locale Set Karna
        $locale = request()->segment(1);
        App::setLocale(in_array($locale, ['ur', 'en']) ? $locale : 'en');
        $locale = App::getLocale();

        // 2. ✅ SAFETY CHECK (Sab se zaroori): 
        // Agar table ya language column nahi hoga toh code crash nahi karega
        if (!app()->runningInConsole() && Schema::hasTable('breaking_news') && Schema::hasColumn('breaking_news', 'language')) {
            
            // 🔴 Breaking News Logic
            view()->share('livebreakingnews', BreakingNews::where('breakingnews_status', 'active')->where('language', $locale)->latest()->take(4)->get());
            view()->share('singleLatestBreakingNews', BreakingNews::where('breakingnews_status', 'active')->where('language', $locale)->latest()->first());
            
            $secondLatestBreakingNews = BreakingNews::where('breakingnews_status', 'active')->where('language', $locale)->latest()->skip(1)->first();
            view()->share('secondLatestBreakingNews', $secondLatestBreakingNews);

            // ✅ All Categories
            view()->share('allcategories', Categories::where('language', $locale)->get());

            // 🟢 News Categories (Politics, Sports, etc.) - Maine loop laga diya hai taake file lambi na ho
            $cats = ['Politics', 'Sports', 'Entertainment', 'World'];
            $urdu_names = ['Politics' => 'سیاست', 'Sports' => 'کھیل', 'Entertainment' => 'تفریح', 'World' => 'دنیا'];

            foreach ($cats as $cat) {
                $news_data = News::where('news_status', 'active')->where('language', $locale)
                    ->whereHas('category', function ($q) use ($locale, $cat, $urdu_names) {
                        $q->where('category_name', $locale === 'ur' ? $urdu_names[$cat] : $cat);
                    })->latest()->take(4)->get();
                
                view()->share(strtolower($cat) . 'news', $news_data);
            }

            // 📄 Static Pages (Privacy, Terms, About)
            view()->share('privacypolicy', PrivacyPolicy::where('status', 'active')->where('language', $locale)->latest('id')->first());
            view()->share('terms', Terms::where('status', 'active')->where('language', $locale)->latest('id')->first());
            view()->share('about', About::where('status', 'active')->where('language', $locale)->latest('id')->first());

            // 📌 Navigation & General News
            $latestnavnews = Categories::with(['posts' => fn($q) => $q->where('language', $locale)])
                ->where('language', $locale)->latest()->take(4)->get();

            $latestFourNews = News::where('language', $locale)->latest()->take(4)->get();

            // 🟨 Share all remaining variables
            View::share([
                'latestnavnews' => $latestnavnews,
                'latestFourNews' => $latestFourNews,
                'locale' => $locale,
            ]);
        }

        Route::middleware('web')->group(base_path('routes/web.php'));
    }
}