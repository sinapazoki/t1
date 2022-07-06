<?php

use App\Http\Controllers\Admin\AdminCotroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Customer\LoginRegisterController;

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


Route::namespace('Auth')->middleware('guest')->group( function() {

Route::get('login-register', [LoginRegisterController::class , 'LoginRegisterForm' ] )->name('login-register-form');
Route::post('/register', [LoginRegisterController::class , 'Register' ] )->name('register');
Route::post('/login', [LoginRegisterController::class , 'Login' ] )->name('login');

Route::get('login-confirm/{token}', [LoginRegisterController::class , 'LoginConfirmForm' ] )->name('login-confirm-form');
Route::post('/login-confirm/{token}', [LoginRegisterController::class , 'LoginConfirm' ] )->name('login-confirm');
Route::get('login-resend-confirm/{token}', [LoginRegisterController::class , 'LoginResendConfirm' ] )->name('login-confirm-resend');

});


Route::prefix('admin')->namespace('Admin')->group( function() {

    Route::get('/', function (){ return redirect()->route('admin-login-form');});
    Route::get('/login', [AdminCotroller::class , 'LoginForm' ] )->name('admin-login-form');
    Route::post('/login', [AdminCotroller::class , 'LoginCheck' ] )->name('admin-login-check');

    Route::middleware('admin')->group( function() {
        Route::get('dashboard', [AdminCotroller::class , 'index' ] )->name('admin-home');
        Route::get('users', [AdminCotroller::class , 'UserList' ] )->name('admin-user-list');
        Route::get('emails', [AdminCotroller::class , 'AdminNotifies' ] )->name('admin-email-list');
        Route::post('emails', [AdminCotroller::class , 'SendEmailNotifies' ] )->name('admin-send-email');

        Route::group(['prefix' => 'laravel-filemanager'], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });
    });

    });


Route::post('logout', [LoginRegisterController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('site.Pages.welcome');
})->name('home');

Route::get('/home', function () {
    return view('site.Pages.home');
})->name('main');