<?php

use App\Models\User;
use App\Models\ContactUs;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UrduWebController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LiveVideosController;
use App\Http\Controllers\BreakingNewsController;
use App\Http\Controllers\WebController;

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
    //    Route::get('/get-news-by-language/{lang}', [BreakingNewsController::class, 'getNewsByLanguage']);
    Route::get('/get-news-by-language/{lang}', [BreakingNewsController::class, 'getNewsByLanguage'])->name('get.news.by.language');


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

    Route::prefix('blog')->group(function () {

        Route::get('/add', [BlogController::class, 'index'])->name('blog.add');
        Route::post('/add', [BlogController::class, 'store']);
        Route::get('/show', [BlogController::class, 'show'])->name('blog.show');
        Route::get('/view/{id}', [BlogController::class, 'view'])->name('blog.view');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::patch('/update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
    });

    // Contact show
    Route::get('/contact/show', [ContactController::class, 'show'])->name('contact.show');


    // MIddleware end
});

// Websites Routes Start
Route::get('/', [WebController::class, 'index'])->name('news.index');
Route::get('/website/news', [WebController::class, 'view'])->name('Webnews.view');
// Route::get('/category', [WebController::class, 'category'])->name('news.category');
// Route::get('/country', [WebController::class, 'country'])->name('news.country');
// Route::get('/city', [WebController::class, 'city'])->name('news.city');
// Route::get('/shownews', [WebController::class, 'shownews'])->name('show.news');
// Single News show in website 
Route::get('/news/{id}', [WebController::class, 'showsinglenews'])->name('single.news');
// Single Breaking news show in website
Route::get('/breakingnews/{id}', [WebController::class, 'showsinglebreakingnews'])->name('single.breakingnews');
// Single category show in website 
Route::get('/news/category/{id}', [WebController::class, 'singlecategoryview'])->name('single.category');
// Single blogs show in website
Route::get('/blog/{id}', [WebController::class, 'singleblog'])->name('single.blog');
// End Websites Routes
// Show Author profile with news
Route::get('/author/{slug}', [WebController::class, 'showAuthorProfile'])->name('author.profile');
// Show Author profile with news end
// Privacy page
Route::get('/privacy', [WebController::class, 'privacy'])->name('privacy');
// Privacy page end
// Terms page
Route::get('/terms', [WebController::class, 'terms'])->name('terms');
// Terms page end
//About page
Route::get('/about', [WebController::class, 'about'])->name('about');
//About page end
// Contact routes in website
Route::post('/contact/add', [ContactController::class, 'store']);
Route::get('/contact/add', [ContactController::class, 'index'])->name('contact.add');
//  Website routes end
// Route::get('/contact', [WebController::class,''])->name('');

Route::redirect('/admin', '/admin/login');

// 404 Route
Route::fallback(function () {
    return view('404');
});


// Urdu Website Routes Start

// Urdu Website Routes Start
// Urdu Website Routes Start
Route::get('/ur', [UrduWebController::class, 'index'])->name('urdu.news.index');
Route::get('/ur/website/news', [UrduWebController::class, 'view'])->name('urdu.Webnews.view');
// Route::get('/ur/category', [UrduWebController::class, 'category'])->name('urdu.news.category');
// Route::get('/ur/country', [UrduWebController::class, 'country'])->name('urdu.news.country');
// Route::get('/ur/city', [UrduWebController::class, 'city'])->name('urdu.news.city');
// Route::get('/ur/shownews', [UrduWebController::class, 'shownews'])->name('urdu.show.news');
// Route::get('/ur/search', [UrduWebController::class, 'search'])->name('urdu.news.search');

// Single News show in Urdu website
Route::get('/ur/news/{id}', [UrduWebController::class, 'showsinglenews'])->name('urdu.single.news');

// Single Breaking news
Route::get('/ur/breakingnews/{id}', [UrduWebController::class, 'showsinglebreakingnews'])->name('urdu.single.breakingnews');

// Single category show
Route::get('/ur/news/category/{id}', [UrduWebController::class, 'singlecategoryview'])->name('urdu.single.category');

// Blogs
Route::get('/ur/blog/{id}', [UrduWebController::class, 'singleblog'])->name('urdu.single.blog');

// Author
Route::get('/ur/author/{slug}', [UrduWebController::class, 'showAuthorProfile'])->name('urdu.author.profile');

// Static pages
Route::get('/ur/privacy', [UrduWebController::class, 'privacy'])->name('urdu.privacy');
Route::get('/ur/terms', [UrduWebController::class, 'terms'])->name('urdu.terms');
Route::get('/ur/about', [UrduWebController::class, 'about'])->name('urdu.about');

// Contact (same controller for form)
Route::post('/ur/contact/add', [ContactController::class, 'store']);
Route::get('/ur/contact/add', [ContactController::class, 'index'])->name('urdu.contact.add');
// Urdu Website Routes End

// Urdu Website Routes End