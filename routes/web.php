<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LogoutController;
use App\Http\Controllers\admin\RegistrationController;
use App\Http\Controllers\admin\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.home');
});

/*Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});*/

/*Route::name('user.')->group(function () {
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect(\route('user.private'));
        }

        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function () {
       Auth::logout();

        return redirect('/');
    })->name('logout');

    Route::get('registration', function () {
        if (Auth::check()) {
            return redirect(\route('user.private'));
        }

       return view('registration');
    })->name('registration');

    Route::post('/registration', [RegisterController::class, 'save']);
});*/


/** Start my routes */
Route::get('admin', function () {
    return redirect(route('admin.login.show'));
});

Route::name('admin.')->group(function () {
    Route::get('admin/registration', [RegistrationController::class, 'create'])->name('registration.create');

    Route::post('admin/registration', [RegistrationController::class, 'store'])->name('registration.store');

    Route::get('admin/home', [HomeController::class, 'index'])->name('home');

    Route::get('admin/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('admin/login', [LoginController::class, 'index'])->name('login.show');

    Route::post('admin/login', [LoginController::class, 'login'])->name('login.auth');
});

