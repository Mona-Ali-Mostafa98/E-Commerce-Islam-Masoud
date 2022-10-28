<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            $settings = \App\Models\Setting::first();

            $services = \App\Models\Service::where('status' ,'عرض')->latest()->take(3)->get();
            $partners = \App\Models\Partner::where('status' ,'عرض')->latest()->get();

            $cart_items = \App\Models\Cart::with('product')->where('id', $this->getCartId())->orWhere('user_id',  \Illuminate\Support\Facades\Auth::id())->get();

            $sub_total = $cart_items->sum(function($cart_item) {
                return $cart_item->quantity * $cart_item->product->product_price;
            });

            $tax_ratio = $settings->tax ;
            $tax = $sub_total * $tax_ratio / 100;
            $total = $sub_total + $tax ;

            $favorite_products = \App\Models\Wishlist::where('user_id' , \Illuminate\Support\Facades\Auth::guard('web')->user()?->id)->latest()->take(4)->count();

            $view->with(compact('settings' , 'services' , 'partners' ,'cart_items' , 'sub_total' , 'total' , 'favorite_products'));
        });

    }

    // This function to create unique id for cart to store it in cookie
    protected function getCartId()
    {
        $id = request()->cookie('cart_id');
        if (!$id) {
            $id = \Illuminate\Support\Str::uuid();
            \Illuminate\Support\Facades\Cookie::queue('cart_id', $id, 60 * 24 * 7);
        }
        return $id;
    }

}