<?php

use App\Models\User;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LiveVideosController;
use App\Http\Controllers\BreakingNewsController;




// Admin Routes
// Route to display the login form
Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/admin/login', [AuthController::class, 'authentication'])->name('login.submit');
// Middleware routes
Route::middleware(ValidUser::class)->group(function () {
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/profile', [AuthController::class, 'profile'])->name('profile');


    // Route::redirect('/admin', '/admin/login');
    // City Routes
    Route::prefix('city')->group(function () {

        Route::get('/add', [CitiesController::class, 'index'])->name('city.add');
        Route::post('/add', [CitiesController::class, 'store']);
        Route::get('/show', [CitiesController::class, 'show'])->name('city.show');
        Route::get('/edit{id}', [CitiesController::class, 'edit'])->name('city.edit');
        Route::patch('/update{id}', [CitiesController::class, 'update'])->name('city.update');
        Route::delete('/delete{id}', [CitiesController::class, 'destroy'])->name('city.delete');
    });

    // End City Routes

    // Country Routes
    Route::prefix('country')->group(function () {

        Route::get('/add', [CountriesController::class, 'index'])->name('country.add');
        Route::post('/add', [CountriesController::class, 'store']);
        Route::get('/show', [CountriesController::class, 'show'])->name('country.show');
        Route::get('/edit/{id}', [CountriesController::class, 'edit'])->name('country.edit');
        Route::patch('/update/{id}', [CountriesController::class, 'update'])->name('country.update');
        Route::delete('/delete/{id}', [CountriesController::class, 'destroy'])->name('country.delete');
    });

    // End Country Routes

    // City Routes
    Route::prefix('city')->group(function () {

        Route::get('/add', [CitiesController::class, 'index'])->name('city.add');
        Route::post('/add', [CitiesController::class, 'store']);
        Route::get('/show', [CitiesController::class, 'show'])->name('city.show');
        Route::get('/edit/{id}', [CitiesController::class, 'edit'])->name('city.edit');
        Route::patch('/update/{id}', [CitiesController::class, 'update'])->name('city.update');
        Route::delete('/delete/{id}', [CitiesController::class, 'destroy'])->name('city.delete');
    });

    // End City Routes

    // Category Routes
    Route::prefix('category')->group(function () {

        Route::get('/add', [CategoriesController::class, 'index'])->name('category.add');
        Route::post('/add', [CategoriesController::class, 'store']);
        Route::get('/show', [CategoriesController::class, 'show'])->name('category.show');
        Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
        Route::patch('/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
        Route::delete('/delete/{id}', [CategoriesController::class, 'destroy'])->name('category.delete');
    });
    // End Category Routes

    // News Routes

    Route::prefix('news')->group(function () {

        Route::get('/add', [NewsController::class, 'index'])->name('news.add');
        Route::post('/add', [NewsController::class, 'store']);
        Route::get('/show', [NewsController::class, 'show'])->name('news.show');
        Route::get('/view/{id}', [NewsController::class, 'view'])->name('news.view');
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::patch('/update/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/delete/{id}', [NewsController::class, 'destroy'])->name('news.delete');
    });
    // End News Routes

    // User Routes
    Route::prefix('user')->group(function () {

        Route::get('/add', [UserController::class, 'index'])->name('user.add');
        Route::post('/add', [UserController::class, 'store']);
        Route::get('/show', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
       Route::get('/{user}/details', [UserController::class, 'showDetails'])->name('user.details');
    });
    // End User Routes


    // Braeking News Routes
    Route::prefix('breakingnews')->group(function () {

        Route::get('/add', [BreakingNewsController::class, 'index'])->name('breakingnews.add');
        Route::post('/add', [BreakingNewsController::class, 'store']);
        Route::get('/show', [BreakingNewsController::class, 'show'])->name('breakingnews.show');
        Route::get('/edit/{id}', [BreakingNewsController::class, 'edit'])->name('breakingnews.edit');
        Route::patch('/update/{id}', [BreakingNewsController::class, 'update'])->name('breakingnews.update');
        Route::delete('/delete/{id}', [BreakingNewsController::class, 'destroy'])->name('breakingnews.delete');
    });

    // End Breaking News Routes

    // Live video Routes

    Route::prefix('livevideo')->group(function () {

        Route::get('/add', [LiveVideosController::class, 'index'])->name('livevideo.add');
        Route::post('/add', [LiveVideosController::class, 'store']);
        Route::get('/show', [LiveVideosController::class, 'show'])->name('livevideo.show');
        Route::get('/edit/{id}', [LiveVideosController::class, 'edit'])->name('livevideo.edit');
        Route::patch('/update/{id}', [LiveVideosController::class, 'update'])->name('livevideo.update');
        Route::delete('/delete/{id}', [LiveVideosController::class, 'destroy'])->name('livevideo.delete');
    });

    // Blog Routes

    // Route::prefix('blog')->group(function () {

    //     Route::get('/add', [BlogController::class, 'index'])->name('blog.add');
    //     Route::post('/add', [BlogController::class, 'store']);
    //     Route::get('/show', [BlogController::class, 'show'])->name('blog.show');
    //     Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    //     Route::patch('/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    //     Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
    // });

    // MIddleware end
});

// Websites Routes Start

Route::get('/', [WebController::class, 'index'])->name('news.index');
Route::get('/website/news', [WebController::class, 'view'])->name('Webnews.view');
Route::get('/category', [WebController::class, 'category'])->name('news.category');
Route::get('/country', [WebController::class, 'country'])->name('news.country');
Route::get('/city', [WebController::class, 'city'])->name('news.city');
Route::get('/shownews', [WebController::class, 'shownews'])->name('show.news');
Route::get('/search', [WebController::class, 'search'])->name('news.search');

// End Websites Routes


// Single News show in website 
Route::get('/news/{id}', [WebController::class, 'showsinglenews'])->name('single.news');
// Single Breaking news show in website
Route::get('/breakingnews/{id}', [WebController::class, 'showsinglebreakingnews'])->name('single.breakingnews');
// Single category show in website 
Route::get('/news/category/{id}', [WebController::class, 'singlecategoryview'])->name('single.category');

Route::redirect('/admin', '/admin/login');

// 404 Route
Route::fallback(function () {
    return view('404');
});
