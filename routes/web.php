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

Route::get('/', function () {
    return view('index');
});

Route::get('/subscribe', function () {
    return view('subscribe');
});

Route::get('/digitalMarketing', function () {
    return view('digitalMarketing');
});

Route::get('/seo', function () {
    return view('seo');
});

Route::get('/digital_marketing_training', function () {
    return view('digital_marketing_training');
});

Route::get('/seo_training', function () {
    return view('seo_training');
});

Route::get('/basic', function () {
    return view('basic');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

});

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'customer']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'customer'])->name('customer');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
