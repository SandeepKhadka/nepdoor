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
use App\Http\Controllers\Front\UserProfileController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\UserHomeController;
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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/adminHome', function () {
//     return view('admin.Home.adminHome');
// });

// Route::get('/subscribe', function () {
//     return view('subscribe');
// });

Route::get('/createTicket', [App\Http\Controllers\Front\TicketController::class, 'createTicket'])->name('createTicket');
Route::get('/allTicket', [App\Http\Controllers\Front\TicketController::class, 'displayAllTickets'])->name('storeAllTicket');



// Route::get('/adminHome', [App\Http\Controllers\AdminHomeController::class, 'getHomeData'])->name('adminHome');





Auth::routes();

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'getSubscriptionDetail'])->name('subscriptionDetail');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

    Route::get('home', [App\Http\Controllers\AdminHomeController::class,'getHomeData'])->name('home');
    Route::resource('package', PackageController::class);
    Route::resource('billing', BillingController::class);
    Route::resource('category', PackageCategoryController::class);
    Route::resource('subscription', SubscriptionController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('helpCenter', HelpCenterController::class);
    Route::resource('ticket', TicketController::class);
    Route::resource('user', UserController::class);
    Route::resource('reply', ReplyController::class);
    Route::get('/replyMessage/{id}', [App\Http\Controllers\ReplyController::class, 'messageReply'])->name('replyMessage');
    Route::resource('contact', ContactController::class);
    Route::resource('frontend', FrontEndController::class);
});

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'customer']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'customer'])->name('customer');

    Route::get('userHome', [App\Http\Controllers\FrontendController::class, 'userHome'])->name('userHome');
    Route::get('digitalMarketing', [App\Http\Controllers\FrontendController::class, 'digitalMarketing'])->name('digitalMarketing');
    Route::get('seo', [App\Http\Controllers\FrontendController::class, 'seo'])->name('seo');
    Route::get('training', [App\Http\Controllers\FrontendController::class, 'training'])->name('training');
    Route::get('basic', [App\Http\Controllers\FrontendController::class, 'basic'])->name('basic');
    Route::get('helpCenter', [App\Http\Controllers\Front\HelpCenterController::class, 'helpCenter'])->name('helpCenter');
    Route::get('billing', [App\Http\Controllers\front\BillingController::class, 'getBillingData'])->name('billing');
    Route::get('activity', [App\Http\Controllers\Front\ActivityController::class, 'getActivityData'])->name('activity');
    Route::get('subscription', [App\Http\Controllers\Front\SubscriptionController::class, 'getSubscriptionData'])->name('subscription');
    Route::get('profile', [App\Http\Controllers\Front\UserController::class, 'getUserData'])->name('user');
    Route::get('userHome', [App\Http\Controllers\Front\UserHomeController::class, 'getUserHomeData'])->name('userHome');

   
});
Route::post('/store/digitalMarketingdata', [App\Http\Controllers\FrontendController::class, 'storeDigitalFormData'])->name('storeDigitalFormData');
Route::post('/store/searchEngineOptimizationdata', [App\Http\Controllers\FrontendController::class, 'storeDigitalFormData'])->name('storeDigitalFormData');
Route::post('/store/trainingdata', [App\Http\Controllers\FrontendController::class, 'storeDigitalFormData'])->name('storeDigitalFormData');
Route::post('/store/basicdata', [App\Http\Controllers\FrontendController::class, 'storeDigitalFormData'])->name('storeDigitalFormData');
Route::post('/store/Ticket', [App\Http\Controllers\Front\TicketController::class, 'storeTicket'])->name('storeTicket');
