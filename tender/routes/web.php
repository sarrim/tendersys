<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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

require_once __DIR__ .'/admin.php';
require_once __DIR__ .'/vendor.php';
require_once __DIR__ .'/user.php';

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('about-us', [HomeController::class, 'about_us']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('privacy', [HomeController::class, 'privacy']);
Route::get('faq', [HomeController::class, 'faq']);

Route::post('subscribe', [HomeController::class, 'subscribe']);
Route::post('contact', [HomeController::class, 'save_contact']);

Route::get('categories', [HomeController::class, 'categories']);
Route::get('category/{slug}', [HomeController::class, 'category_tenders']);

Route::get('tenders', [HomeController::class, 'tenders']);
Route::get('/tender/{slug}', [HomeController::class, 'tender_detail'])->name('tender.detail');

Route::post('save_comment', [HomeController::class, 'save_comment']);

Route::get('/login', [UserController::class, 'login']);
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [UserController::class, 'register']);
Route::post('register', [LoginController::class, 'create'])->name('register');

Route::get('logout', [LogoutController::class, 'perform'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/save-tender/{id}', [HomeController::class, 'save_tender']);

    Route::get('/add-cart', [CartController::class, 'add'])->name('cart.add');
    Route::get('/view-cart', [CartController::class, 'view'])->name('cart.view');
    Route::post('/view-cart', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('cart/remove/{id}', [CartController::class, 'remove_item']);
    Route::get('/my-orders', [CartController::class, 'my_orders']);
    Route::get('/change-status/{id}', [CartController::class, 'change_status']);

    Route::get('/profile', [HomeController::class, 'my_profile']);
    Route::post('/update-profile', [HomeController::class, 'update_profile']);

    Route::get('/user/recharge-balance', [HomeController::class, 'recharge_balance']);
});
