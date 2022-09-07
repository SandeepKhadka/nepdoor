<?php

use App\Http\Controllers\PackageController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HelpCenterController;
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

Route::get('/categoryList', function () {
    return view('admin.Packages.category.categoryList');
});

Route::get('/categoryForm', function () {
    return view('admin.Packages.category.categoryForm');
});

Route::get('/categoryView', function () {
    return view('admin.Packages.category.categoryView');
});

Route::get('/billingList', function () {
    return view('admin.Billing.billingList');
});

Route::get('/billingForm', function () {
    return view('admin.Billing.billingForm');
});

Route::get('/billingView', function () {
    return view('admin.Billing.billingView');
});


Route::get('/subscriptionList', function () {
    return view('admin.Subscription.subscriptionList');
});

Route::get('/subscriptionView', function () {
    return view('admin.Subscription.subscriptionView');
});

Route::get('/subscriptionForm', function () {
    return view('admin.Subscription.subscriptionForm');
});


Route::get('/ticketList', function () {
    return view('admin.Tickets.Ticket.ticketList');
});

Route::get('/ticketView', function () {
    return view('admin.Tickets.Ticket.ticketView');
});

Route::get('/ticketForm', function () {
    return view('admin.Tickets.Ticket.ticketForm');
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
    Route::resource('activity',ActivityController::class);
    Route::resource('user',UserController::class);
    Route::resource('helpCenter',HelpCenterController::class);

});

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'customer']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'customer'])->name('customer');
    

});
