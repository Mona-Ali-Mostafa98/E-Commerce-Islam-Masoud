<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $admins_count = Admin:: count();
        $users_count = User:: count();
        $products_count = Product:: count();
        $orders_count = Order:: count();
        $subscribes_count = Subscribe:: count();
        $contacts_count = Contact:: count();
        $latest_products = Product::latest()->take(10)->get();
        $latest_orders = Order::latest()->take(10)->get();

        return view('admin.dashboard' ,  compact(
            'admins_count' ,
            'users_count' ,
            'products_count' ,
            'orders_count' ,
            'subscribes_count' ,
            'contacts_count' ,
            'latest_products',
            'latest_orders',
        ));
    }
}