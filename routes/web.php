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

Route::get('/tim-kiem', [\App\Http\Controllers\HomeController::class, 'search'])->name('search');

//Route::get('/gio-hang', [\App\Http\Controllers\HomeController::class, 'cart'])->name('cart');

Route::get('/gio-hang', [\App\Http\Controllers\HomeController::class, 'cartList'])->name('cart.list');
Route::post('/gio-hang', [\App\Http\Controllers\HomeController::class, 'addToCart'])->name('cart.store');
Route::get('/update-gio-hang', [\App\Http\Controllers\HomeController::class, 'updateCart'])->name('cart.update');
Route::get('/xoa-san-pham', [\App\Http\Controllers\HomeController::class, 'removeToCart'])->name('cart.remove');
Route::post('/xoa-gio-hang', [\App\Http\Controllers\HomeController::class, 'clearAllCart'])->name('cart.clear');

Route::get('/danh-muc/{category}', [\App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/chi-tiet-san-pham/{id}-{product}', [\App\Http\Controllers\HomeController::class, 'product'])->name('product');

Route::get('/tin-tuc', [\App\Http\Controllers\HomeController::class, 'articles'])->name('articles');
Route::get('/tin-tuc/{slug}', [\App\Http\Controllers\HomeController::class, 'detailArticle'])->name('detail-article');

Route::post('/tin-tuc/{slug}', [\App\Http\Controllers\HomeController::class, 'commentPost'])->name('commentPost');



Route::get('admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::post('/admin/loginPost', [\App\Http\Controllers\AdminController::class, 'loginPost'])->name('admin.loginPost');
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->name('admin.')
    ->middleware('auth')
    ->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    Route::resource('productImages', \App\Http\Controllers\Product_imageController::class);
    Route::resource('banner', \App\Http\Controllers\BannerController::class);
    Route::resource('category', \App\Http\Controllers\CateGoryController::class);
    Route::post('category/restore/{category}', [\App\Http\Controllers\CategoryController::class, 'restore'])->name('category.restore');
    Route::post('product/restore/{category}', [\App\Http\Controllers\ProductController::class, 'restore'])->name('product.restore');
    Route::resource('vendor', \App\Http\Controllers\VendorController::class);
    Route::resource('brand', \App\Http\Controllers\BrandController::class);
    Route::resource('article', \App\Http\Controllers\ArticleController::class);
    Route::resource('contact', \App\Http\Controllers\ContactController::class);
    Route::post('contact/updateNote', [\App\Http\Controllers\ContactController::class, 'updateNote'])->name('contact.updateNote');
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('setting', \App\Http\Controllers\SettingController::class);
    Route::resource('role', \App\Http\Controllers\RoleController::class);
});


