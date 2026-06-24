<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ServicesController;
use App\Models\Article;
use App\Models\Services;
use App\Http\Controllers\ArticleAdminController;
use App\Http\Controllers\ServiceAdminController;

/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')->name('home');

Route::view('/about', 'pages.about');

Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/articles-detail/{id}', [ArticleController::class, 'show'])
    ->name('articles.show');

Route::get('/services', [ServicesController::class, 'index'])
    ->name('services.index');

Route::get('/services-detail/{id}', [ServicesController::class, 'show'])
    ->name('services.show');

Route::view('/contact', 'pages.contact');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    return view('auth.dashboard', [
        'page' => 'dashboard',
        'jumlahArtikel' => Article::count(),
        'jumlahService' => Services::count()
    ]);

})->name('dashboard');

// ADMIN ARTICLES

Route::get('/admin/articles',
    [ArticleAdminController::class,'index']
)->name('admin.articles');


Route::post('/admin/articles/store',
    [ArticleAdminController::class,'store']
)->name('admin.articles.store');


Route::put('/admin/articles/update/{id}',
    [ArticleAdminController::class,'update']
)->name('admin.articles.update');


Route::delete('/admin/articles/delete/{id}',
    [ArticleAdminController::class,'destroy']
)->name('admin.articles.delete');

Route::get('/admin/articles/pdf',
[ArticleAdminController::class,'exportPdf'])
->name('admin.articles.pdf');



// ADMIN SERVICES

Route::get('/admin/services',
    [ServiceAdminController::class,'index']
)->name('admin.services');


Route::post('/admin/services',
    [ServiceAdminController::class,'store']
)->name('admin.services.store');


Route::put('/admin/services/{id}',
    [ServiceAdminController::class,'update']
)->name('admin.services.update');


Route::delete('/admin/services/{id}',
    [ServiceAdminController::class,'destroy']
)->name('admin.services.delete');


Route::get('/admin/services/pdf',
    [ServiceAdminController::class,'exportPdf']
)->name('admin.services.pdf');