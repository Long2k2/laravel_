<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerBanner;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth','adminAuthenticated'])->group(function () {
    Route::get('dashboard',[AdminDashboardController::class,'index']);

    //Banner Route
    Route::controller(ControllerBanner::class)->group(function (){
        Route::get('banner','index');
        Route::get('banner/create','create');
        Route::post('banner','store')->name('store');
        Route::get('banner/{banner}/edit','edit');
        Route::put('banner/{banner}','update')->name('update');
        Route::get('banner/{banner}/delete','destroy');
    });
    //Category Route
    Route::controller(CategoryController::class)->group(function (){
        Route::get('category','index');
        Route::get('category/create','create');
        Route::post('category','store')->name('store');
        Route::get('category/{category}/edit','edit');
        Route::put('category/{category}','update')->name('update');
        Route::get('category/{category}/delete','destroy');
    });
    //Brand Route
    Route::controller(BrandController::class)->group(function(){
        Route::get('brand','index');
        Route::get('brand/create','create');
        Route::post('brand','store')->name('store');
        Route::get('brand/{brand}/edit','edit');
        Route::put('brand/{brand}','update')->name('update');
        Route::get('brand/{brand}/delete','destroy');
    });
    //Product
    Route::controller(ProductController::class)->group(function(){
        Route::get('product','index');
        Route::get('product/create','create');
        Route::post('product','store')->name('store');
        Route::get('product/{product}/delete','destroy');
    });
});
