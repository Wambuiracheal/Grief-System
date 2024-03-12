<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\Auth\RegisterController;

// Views
Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', function () {
    return view('homepage');
});
// End for Views


Auth::routes();
// Route::get('/login', 'Auth\LoginController@showLoginForm');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Register Route
// Route::post('/register', 'Auth\RegisterController@store')->name('register.store');

// Logout Feature
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
