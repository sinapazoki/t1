<?php

use App\Http\Controllers\Admin\AdminCotroller;
use App\Http\Controllers\Admin\Content\PostCategoryController;
use App\Http\Controllers\Admin\Content\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Customer\LoginRegisterController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Livewire\Admin\MenuForm;
use App\Http\Livewire\Admin\PostCreate;

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

        Route::get('posts/categories', [PostCategoryController::class , 'index' ] )->name('admin-post-category');
        Route::get('posts', [PostController::class , 'index' ] )->name('admin-post-list');
        Route::get('posts/create', [PostController::class , 'create' ] )->name('admin-post-create');

        Route::get('menus', [AdminCotroller::class , 'MenuList' ] )->name('admin-menu-list');

        Route::group(['prefix' => 'laravel-filemanager'], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });
    });

    });



    Route::get('/posts/{category:category_id}/{post:slug}', [BlogController::class, 'show'])->name('post.single');
    Route::get('/category/{category:category_id}', [BlogController::class, 'ShowCategory'])->name('post.category');
    Route::get('/posts', [BlogController::class, 'index'])->name('post.index');
    

    Route::get('/contact-us', [SiteController::class, 'ShowContact'])->name('site.contact-us');
    Route::middleware('throttle:contact-form')->post('/contact-us', [SiteController::class, 'GetContactForm'])->name('site.contact-form');




    Route::post('logout', [LoginRegisterController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('site.Pages.welcome');
    })->name('home');

    Route::get('/home', [SiteController::class, 'index'])->name('site.home');
