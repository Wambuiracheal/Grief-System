<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ProgramsController;
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

Route::get('/profile', function () {
    return view('profile');
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
Route::resource('programs',ProgramsController::class);
Route::resource('sessions',SessionsController::class);
Route::resource('trainers',CounselorController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/client.profile', [\App\Http\Controllers\DashboardController::class, 'index'])->name('client.profile');
Route::get('/client.index', [\App\Http\Controllers\DashboardController::class, 'index'])->name('client.index');
Route::get('/client.session', [\App\Http\Controllers\DashboardController::class, 'index'])->name('client.session');
Route::get('/counselors', [CounselorController::class, 'index'])->name('counselors.index');


//dashboard
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
Route::get('index', function() { return view('index'); })->name('client.index');
Route::get('Client/index', function() { return view('Client/index'); })->name('Cient.index');
Route::get('Bookings', function() { return view('Bookings'); })->name('Bookings');
Route::get('Programs', function() { return view('Programs'); })->name('Programs');
Route::get('Client/Profile', function() { return view('Client/Profile'); })->name('Client.Profile');

Route::get('book-session', function() { return view('book-session'); });
Route::get('create-session', function() { return view('counselor/create-session'); });

Route::get('profile', function() { return view('profile'); })->name('client.profile');
Route::get('bookings', function() { return view('bookings'); })->name('client.bookings');
Route::get('programs', function() { return view('programs'); })->name('programs');

Route::get('book-session', [SessionsController::class,'booksession'])->name('booksession');
Route::post('session', [SessionsController::class, 'store'])->name('create-session');
Route::get('index', [SessionsController::class,'index'])->name('client.index');

Route::get('Counselor.index');
Route::get('Counselor/Bookings', [BookingsController::class,'index'])->name('Counselor.Bookings');
Route::post('Counselor/Bookings/{id}', [BookingsController::class, 'approveBooking'])->name('approve-booking');
Route::get('Counselor/Profile', [CounselorController::class, 'profile'])->name('Counselor.Profile');


Route::get('profile', [ClientsController::class,'profile'])->name('client.profile');
Route::get('sessions', [SessionsController::class, 'sessions'])->name(('client.sessions'));
Route::get('bookings', [BookingsController::class, 'clientbookings'])->name('client.bookings');

Route::get('Counselor/Programs', [ProgramsController::class, 'index'])->name('Counselor.Programs');
Route::post('Counselor/Programs', [ProgramsController::class, 'store'])->name('create.program');



Route::get('Counselor/Sessions', [SessionsController::class, 'approvedSessions'])->name('Counselor.Sessions');
Route::post('Counselor/Sessions/{id}', [SessionsController::class, 'markAttendance'])->name('mark.attendance');

Route::get('Counselor/Programs/{id}', [ProgramsController::class, 'show'])->name('show.program');
Route::delete('Counselor/Programs/{id}', [ProgramsController::class, 'destroy'])->name('delete.program');
Route::get('Counselor/client-records/{id}', [ClientsController::class, 'showRecords'])->name('client.records');

});