<?php

use App\Http\Controllers\Website\ServiceController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\AboutUsController;
use App\Http\Controllers\Website\Auth\AuthController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\GalleryController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\Auth\PasswordController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\FavoriteController;
use App\Http\Controllers\Website\PolicyController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use Illuminate\Support\Facades\Artisan;
// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });
Route::get('/foo', function () {
   $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
   $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
   symlink($target, $link);
   echo "Done";
});

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] //to open website with last used lang
], function(){

    Route::get('/', [IndexController::class, 'index'])->name('website.index');

    Route::prefix('website')->name('website.')->group(function () {

        // Start of auth routes
        Route::get('show_login_form', [AuthController::class, 'show_login_form'])->name('show_login_form');
        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::get('show_register_form', [AuthController::class, 'show_register_form'])->name('show_register_form');
        Route::post('register', [AuthController::class, 'register'])->name('register');

        Route::post('change_password', [PasswordController::class, 'changePassword'])->name('change_password')->middleware('auth:web');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:web');
        // End of auth routes

        Route::get('profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth:web');

        Route::post('update/profile/{user}', [AuthController::class, 'update_profile'])->name('update.profile')->middleware('auth:web');

        Route::get('policy', [PolicyController::class, 'index'])->name('policy');

        Route::get('about',  [AboutUsController::class, 'index'])->name('about');

        Route::get('services',  [ServiceController::class, 'index'])->name('services');

        Route::get('search', [IndexController::class, 'search'])->name('search');

        Route::get('blogs',  [BlogController::class, 'index'])->name('blogs');
        Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

        Route::get('products',  [ProductController::class, 'index'])->name('products');
        Route::get('best_selling_products',  [ProductController::class, 'best_selling_products'])->name('best_selling_products');
        Route::get('products/{product:slug}',  [ProductController::class, 'show'])->name('products.show');
        Route::post('product_comment/store', [ProductController::class, 'store_comment'])->name('product_comment.store')->middleware('auth:web');


        Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
        Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');

        Route::get('galleries', [GalleryController::class, 'index'])->name('galleries');

        Route::resource('cart', CartController::class)->only('index' , 'store' , 'delete' );
        Route::delete('delete_product_from_cart/{product}', [CartController::class, 'delete_product_from_cart'])->name('delete_product_from_cart');

        Route::post('update-cart', [CartController::class, 'update'])->name('update.cart');

        Route::post('checkout',[CheckoutController::class , 'store'])->name('checkout')->middleware('auth:web');
        Route::get('order_details', [CheckoutController::class, 'order_details'])->name('order_details')->middleware('auth:web');

        Route::post('add_address_for_user', [AuthController::class, 'add_address_for_user'])->name('add_address_for_user')->middleware('auth:web');
        Route::get('user_address_form/{user_address}', [AuthController::class, 'user_address_form'])->name('user_address_form')->middleware('auth:web');
        Route::put('update_user_address/{user_address}', [AuthController::class, 'update_user_address'])->name('update_user_address')->middleware('auth:web');


        Route::get('wishlist' , [FavoriteController::class, 'wishlist'])->name('wishlist')->middleware('auth:web')->middleware('auth:web');

        Route::post('add/product/wishlist' , [FavoriteController::class, 'add_product_to_wishlist'])->name('add_product_to_wishlist')->middleware('auth:web');
        Route::delete('delete/product/wishlist/{id}' , [FavoriteController::class, 'delete_product_from_wishlist'])->name('delete_product_from_wishlist')->middleware('auth:web');;

        Route::post('store/subscribe', [IndexController::class, 'store_subscribe'])->name('store.subscribe');

    });
});