<?php

namespace App\Providers;

use App\Models\BreakingNews;
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
        view()->share('singleLatestBreakingNews',BreakingNews::where('breakingnews_status', 'active')->latest()->first());

// live breaking news variable for single latest breaking news homepage section 2 

           $secondLatestBreakingNews = BreakingNews::where('breakingnews_status', 'active')
                                    ->latest()
                                    ->skip(1) // Skip the first (latest) result
                                    ->first(); // Get the next (second latest) result
        view()->share('secondLatestBreakingNews', $secondLatestBreakingNews);

    }
}
