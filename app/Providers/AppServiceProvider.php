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
        view()->share('livebreakingnews', BreakingNews::where('breakingnews_status', 'active')->latest()->take(4)->get());
    }
}
