<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

Route::prefix('vendor')->group(function(){
    Route::get('login', [LoginController::class, 'index']);
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::get('register', [LoginController::class, 'register']);
    Route::post('register', [LoginController::class, 'create']);

    Route::get('logout', [LogoutController::class, 'perform'])->name('logout/perform');
});


Route::middleware(['auth', 'is-verified', 'is-vendor'])->prefix('vendor')->group(function(){
    Route::get('dashboard', [VendorController::class, 'index']);

    Route::get('profile', [VendorController::class, 'profile']);
    Route::post('profile/update', [VendorController::class, 'update_profile'])->name('profile.update');
    Route::post('profile/update/picture', [VendorController::class, 'update_profile_picture'])->name('picture.update');
    Route::post('password/update', [VendorController::class, 'update_password'])->name('password.update');

    Route::get('business', [VendorController::class, 'business']);
    Route::post('business', [VendorController::class, 'update_business'])->name('business.update');
    Route::post('business/logo', [VendorController::class, 'update_business_logo'])->name('business.logo');

    Route::get('users', [VendorController::class, 'users'])->name('vendor.users');
    Route::get('users/add', [VendorController::class, 'add_user'])->name('user.add');
    Route::get('user/{id}', [VendorController::class, 'edit_user'])->name('user.edit');
    Route::get('user/delete/{id}', [VendorController::class, 'delete_user'])->name('user.delete');

    Route::get('orders', [VendorController::class, 'orders'])->name('vendor.orders');
    Route::get('order/update/{id}', [VendorController::class, 'update_order']);
    Route::get('order/{id}', [VendorController::class, 'view_order'])->name('order.view');
    Route::get('order/delete/{id}', [VendorController::class, 'delete_order'])->name('order.delete');

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
    
    Route::get('locations', [LocationController::class, 'index'])->name('vendor.locations');
    Route::get('location/add', [LocationController::class, 'create'])->name('location.add');
    Route::post('locations', [LocationController::class, 'store'])->name('location.save');
    Route::get('location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::post('location/update/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::get('location/delete/{id}', [LocationController::class, 'destroy'])->name('location.delete');

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
