<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CategoriesController;


// Admin Routes
// Route to display the login form
Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/admin/login', [AuthController::class, 'authentication'])->name('login.submit');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/profile', [AuthController::class, 'profile'])->name('profile');

Route::redirect('/admin', '/admin/login');
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

// End News Routes

// User Routes
Route::prefix('user')->group(function () {

    Route::get('/add', [UserController::class, 'index'])->name('user.add');
    Route::post('/add', [UserController::class, 'store']);
    Route::get('/show', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

// End User Routes



// 404 Route
// Route::fallback(function () {
//     return view('404');
// });
