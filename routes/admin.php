<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] //to open website with last used lang
], function(){

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest:admin');
        Route::post('/do_login', [AuthController::class, 'do_login'])->name('do_login')->middleware('guest:admin');

        Route::middleware('isAdmin:admin')->group(function(){

            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');

            Route::resource('roles', RoleController::class);

            Route::resource('admins', AdminController::class);

            Route::get('/settings/edit', [SettingController ::class, 'edit'])->name('settings.edit');
            Route::put('/settings/update/{setting}', [SettingController::class, 'update'])->name('settings.update');

            // Route::resource('offers', OfferController::class);
            Route::resource('partners', PartnerController::class);
            Route::resource('services', ServiceController::class);


            Route::resource('sliders', SliderController::class);

            Route::resource('blogs', BlogController::class);


            Route::resource('products', ProductController::class);
            Route::get('delete_product_image/{image_id}', [ProductController::class , 'delete_product_image'])->name('delete_product_image');

            Route::resource('galleries', GalleryController::class);


            Route::resource('users', UserController::class);

            Route::resource('orders', OrderController::class)->except('create' , 'store');


            Route::resource('contacts', ContactController::class)->only('index' , 'show' , 'destroy');

            Route::resource('subscribes', SubscribeController::class)->only('index' , 'destroy');

            // Route::post('mark-as-read',  [DashboardController::class, 'markNotification'])->name('markNotification');

        });

    });
});
