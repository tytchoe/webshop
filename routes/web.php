<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homeindex');

Route::get('/lien-he', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/lien-he', [\App\Http\Controllers\HomeController::class, 'contactPost'])->name('contactPost');

Route::get('/gioi-thieu', [\App\Http\Controllers\HomeController::class, 'introduce'])->name('introduce');

Route::get('/tin-tuc', [\App\Http\Controllers\HomeController::class, 'articles'])->name('articles');
Route::get('/tin-tuc/{slug}', [\App\Http\Controllers\HomeController::class, 'detailArticle'])->name('detail-article');
Route::post('/tin-tuc/{slug}', [\App\Http\Controllers\HomeController::class, 'commentPost'])->name('commentPost');


Route::get('admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::post('/admin/loginPost', [\App\Http\Controllers\AdminController::class, 'loginPost'])->name('admin.loginPost');
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    Route::resource('banner', \App\Http\Controllers\BannerController::class);
    Route::resource('category', \App\Http\Controllers\CateGoryController::class);
    Route::post('category/restore/{category}', [\App\Http\Controllers\CategoryController::class, 'restore'])->name('category.restore');
    Route::resource('vendor', \App\Http\Controllers\VendorController::class);
    Route::resource('brand', \App\Http\Controllers\BrandController::class);
    Route::resource('article', \App\Http\Controllers\ArticleController::class);
    Route::resource('contact', \App\Http\Controllers\ContactController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('setting', \App\Http\Controllers\SettingController::class);
    Route::resource('role', \App\Http\Controllers\RoleController::class);
});


