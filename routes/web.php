<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PackageCategoryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ContactController;
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

Route::get('/replyList', function () {
    return view('admin.Tickets.TicketReply.replyList');
});

Route::get('/replyForm', function () {
    return view('admin.Tickets.TicketReply.replyForm');
});

Route::get('/replyView', function () {
    return view('admin.Tickets.TicketReply.replyView');
});

Route::get('/contactList', function () {
    return view('admin.Contact.contactList');
});

Route::get('/contactView', function () {
    return view('admin.Contact.contactView');
});

Route::get('/userList', function () {
    return view('admin.User.userList');
});

Route::get('/userView', function () {
    return view('admin.User.userView');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

    Route::resource('package',PackageController::class);
    Route::resource('billing',BillingController::class);
    Route::resource('category',PackageCategoryController::class);
    Route::resource('subscription',SubscriptionController::class);
    Route::resource('activity',ActivityController::class);
    Route::resource('helpCenter',HelpCenterController::class);
    Route::resource('ticket',TicketController::class);
    Route::resource('user',UserController::class);
    Route::resource('reply',ReplyController::class);
    Route::resource('contact',ContactController::class);

});

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'customer']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'customer'])->name('customer');

});
