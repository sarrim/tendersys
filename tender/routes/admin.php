<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubCategoryController;


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

Route::prefix('admin')->group(function(){
    Route::get('login', [LoginController::class, 'admin_login']);
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::get('register', [LoginController::class, 'register']);
    Route::post('register', [LoginController::class, 'create']);

    Route::get('logout', [LogoutController::class, 'perform'])->name('logout/perform');
});

Route::get('order/details/{id}', [VendorController::class, 'order_details']);

// Route::get('admin/order/payment-status/{id}', [VendorController::class, 'order_details']);


Route::middleware(['auth', 'is-verified', 'is-admin'])->prefix('admin')->group(function () {

    Route::get('dashboard', [VendorController::class, 'index']);

    Route::get('profile', [VendorController::class, 'profile']);
    Route::post('profile/update', [VendorController::class, 'update_profile'])->name('profile.update');
    Route::post('profile/update/picture', [VendorController::class, 'update_profile_picture'])->name('picture.update');
    Route::post('password/update', [VendorController::class, 'update_password'])->name('password.update');

    Route::get('business', [VendorController::class, 'business']);
    Route::post('business', [VendorController::class, 'update_business'])->name('business.update');
    Route::post('business/logo', [VendorController::class, 'update_business_logo'])->name('business.logo');

    Route::get('users', [VendorController::class, 'users'])->name('admin.users');
    Route::get('users/add', [VendorController::class, 'add_user'])->name('user.add');
    Route::get('user/update/{id}', [VendorController::class, 'update_user']);
    Route::get('user/{id}', [VendorController::class, 'edit_user'])->name('user.edit');
    Route::get('user/delete/{id}', [VendorController::class, 'delete_user'])->name('user.delete');

    Route::get('orders', [VendorController::class, 'orders'])->name('admin.orders');
    Route::get('order/update/{id}', [VendorController::class, 'update_order']);
    // Route::get('order/{id}', [VendorController::class, 'view_order'])->name('order.view');
    Route::get('order/delete/{id}', [VendorController::class, 'delete_order'])->name('order.delete');

    Route::get('order/payment-status', [VendorController::class, 'payment_status'])->name('order.payment');

    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('category/add', [CategoryController::class, 'create'])->name('category.add');
    Route::post('categories', [CategoryController::class, 'store'])->name('category.save');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories');
    Route::get('subcategory/add', [SubCategoryController::class, 'create'])->name('subcategory.add');
    Route::post('subcategories', [SubCategoryController::class, 'store'])->name('subcategory.save');
    Route::get('subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.delete');

    Route::get('tenders', [VendorController::class, 'tenders'])->name('admin.tenders');
    Route::get('bids', [VendorController::class, 'bids'])->name('admin.bids');
    Route::get('add-tender', [VendorController::class, 'add_tender'])->name('tender.add');
    Route::post('tenders', [VendorController::class, 'save_tender']);
    Route::get('tender/{id}', [VendorController::class, 'edit_tender'])->name('tender.edit');
    Route::post('tenders/update/{id}', [VendorController::class, 'update_tender']);
    Route::get('tender/delete/{id}', [VendorController::class, 'delete_tender'])->name('tender.delete');



    Route::get('locations', [LocationController::class, 'index'])->name('vendor.locations');
    Route::get('location/add', [LocationController::class, 'create'])->name('location.add');
    Route::post('locations', [LocationController::class, 'store'])->name('location.save');
    Route::get('location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::post('location/update/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::get('location/delete/{id}', [LocationController::class, 'destroy'])->name('location.delete');

    Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('products/add', [ProductController::class, 'create'])->name('product.add');
    Route::post('products', [ProductController::class, 'store'])->name('product.save');
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('products/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('products/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::post('product/image/save', [ProductController::class, 'save_images'])->name('product.image.save');
    Route::get('product/image/delete/{id}', [ProductController::class, 'delete_image'])->name('product.image.delete');

});



//     Route::get('/dashboard', [dashboard\Analytics::class, 'index']);

// $controller_path = 'App\Http\Controllers';

// // Main Page Route
// Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');

// // layout
// Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
// Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
// Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
// Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
// Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// // pages
// Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
// Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
// Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
// Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
// Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// // authentication
// Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
// Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
// Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// // cards
// Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// // User Interface
// Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
// Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
// Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
// Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
// Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
// Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
// Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
// Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
// Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
// Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
// Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
// Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
// Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
// Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
// Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
// Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
// Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
// Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
// Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// // extended ui
// Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
// Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// // icons
// Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// // form elements
// Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
// Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// // form layouts
// Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
// Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// // tables
// Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');



// });
