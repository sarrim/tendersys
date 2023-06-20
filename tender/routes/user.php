<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;

Route::prefix('user')->group(function(){
    Route::get('login', [UserController::class, 'login']);
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::get('register', [UserController::class, 'register']);
    Route::post('register', [LoginController::class, 'create']);

    Route::get('logout', [LogoutController::class, 'perform'])->name('logout/perform');
});


Route::middleware(['auth', 'is-verified', 'is-buyer'])->prefix('user')->group(function(){
    Route::get('dashboard', [UserController::class, 'index']);

    Route::get('profile', [UserController::class, 'profile']);
    Route::post('profile/update', [UserController::class, 'update_profile'])->name('profile.update');
    // Route::post('profile/update/picture', [UserController::class, 'update_profile_picture'])->name('picture.update');
    Route::get('change-password', [UserController::class, 'change_password']);
    Route::post('password/update', [UserController::class, 'update_password'])->name('password.update');

    Route::get('delete', [UserController::class, 'delete_user']);

    Route::post('send-message', [UserController::class, 'send_message']);

    Route::get('messages', [UserController::class, 'message']);
    Route::get('get-messages', [UserController::class, 'get_messages']);

    Route::get('bids', [UserController::class, 'bids']);

    Route::post('apply-for-tender/{id}', [UserController::class, 'apply_for_tender']);

    Route::get('business', [UserController::class, 'business']);
    Route::post('business', [UserController::class, 'update_business'])->name('business.update');
    Route::post('business/logo', [UserController::class, 'update_business_logo'])->name('business.logo');

    Route::get('tenders', [UserController::class, 'tenders'])->name('user.tenders');
    Route::get('add-tender', [UserController::class, 'add_tender'])->name('tender.add');
    Route::post('tenders', [UserController::class, 'save_tender']);
    Route::get('tender/{id}', [UserController::class, 'edit_tender'])->name('tender.edit');
    Route::post('tenders/update/{id}', [UserController::class, 'update_tender']);
    Route::get('tender/delete/{id}', [UserController::class, 'delete_tender'])->name('tender.delete');

    Route::get('orders', [UserController::class, 'orders'])->name('vendor.orders');
    Route::get('order/update/{id}', [UserController::class, 'update_order']);
    Route::get('order/{id}', [UserController::class, 'view_order'])->name('order.view');
    Route::get('order/delete/{id}', [UserController::class, 'delete_order'])->name('order.delete');

    Route::get('categories', [CategoryController::class, 'index'])->name('vendor.categories');
    Route::get('category/add', [CategoryController::class, 'create'])->name('category.add');
    Route::post('categories', [CategoryController::class, 'store'])->name('category.save');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('subcategories', [SubCategoryController::class, 'index'])->name('vendor.subcategories');
    Route::get('subcategory/add', [SubCategoryController::class, 'create'])->name('subcategory.add');
    Route::post('subcategories', [SubCategoryController::class, 'store'])->name('subcategory.save');
    Route::get('subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.delete');

    Route::get('products', [ProductController::class, 'index'])->name('vendor.products');
    Route::get('products/add', [ProductController::class, 'create'])->name('product.add');
    Route::post('products', [ProductController::class, 'store'])->name('product.save');
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('products/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('products/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::post('product/image/save', [ProductController::class, 'save_images'])->name('product.image.save');
    Route::get('product/image/delete/{id}', [ProductController::class, 'delete_image'])->name('product.image.delete');

});


?>
