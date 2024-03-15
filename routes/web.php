<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CounselorController;
use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\Auth\RegisterController;

// Views
Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/client.profile', function () {
    return view('client.profile');
});

Route::get('/bookings', function () {
    return view('bookings');
});
//authentication
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
    ->name('password.request');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])
    ->name('password.reset');

Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])
    ->name('password.update');

// End for Views


Auth::routes();
// Route::get('/login', 'Auth\LoginController@showLoginForm');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/client.profile', [\App\Http\Controllers\DashboardController::class, 'index'])->name('client.profile');
Route::get('/client.index', [\App\Http\Controllers\DashboardController::class, 'index'])->name('client.index');
Route::get('/client.session', [\App\Http\Controllers\DashboardController::class, 'index'])->name('client.session');
Route::get('/counselors', [CounselorController::class, 'index'])->name('counselors.index');



// Register Route
// Route::post('/register', 'Auth\RegisterController@store')->name('register.store');

// Logout Feature
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//dashboard
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
    //Route::get('index', function() { return view('index'); })->name('client.index');
    //Route::get('Trainer/index', function() { return view('Trainer/index'); })->name('trainer.index');
    //Route::get('Trainer/Bookings', function() { return view('Trainer/Bookings'); })->name('trainer.Bookings');
    //Route::get('Trainer/Equipment', function() { return view('Trainer/Equipment'); })->name('trainer.Equipment');
    //Route::get('Trainer/Programs', function() { return view('Trainer/Programs'); })->name('trainer.Programs');
    //Route::get('Trainer/Profile', function() { return view('Trainer/Profile'); })->name('trainer.Profile');

    Route::get('book-session', function() { return view('book-session'); });
    Route::get('create-session', function() { return view('Trainer/create-session'); });

    //Route::get('profile', function() { return view('profile'); })->name('client.profile');
    Route::get('bookings', function() { return view('bookings'); })->name('client.bookings');
    //Route::get('programs', function() { return view('programs'); })->name('programs');

});