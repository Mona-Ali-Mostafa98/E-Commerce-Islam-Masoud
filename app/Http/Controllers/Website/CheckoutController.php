<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use App\Models\Setting;
use App\Models\UserAddress;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Throwable;



class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $user_id = $user->id;

        //return all products in cart
        $products = Cart::with('product')
            ->where('user_id', $user_id)
            ->orWhere('id', $request->cookie('cart_id'))
            ->get();

        if (!$products) {
            return redirect()->route('website.cart');
        }
        // Get Total price of order
        $sub_total = $products->sum(function($item) {
            return $item->product->product_price * $item->quantity;
        });

        $settings = Setting::first();

        $tax_ratio = $settings->tax ;
        $shipping_price = $settings->shipping_price ;
        $tax = $sub_total * $tax_ratio / 100;
        $total = $sub_total + $tax + $shipping_price;

        DB::beginTransaction();
        try {
            $user_address_id = $request->user_address_id ;

            // Store order address according to user select address from user_addresses table or create new address
                if($user_address_id){
                    // create Order
                    $order = Order::create([
                        'user_id' => $user_id ,
                        'order_number' => rand(1000000 , 9999999),
                        // 'payment_method' => "card",
                        'total_price' => $total,
                        'user_address_id' => $user_address_id ,

                    ]);

                    $user_address = UserAddress::where('id' , $request->user_address_id)->first();

                    OrderAddress::create([
                        'order_id' => $order->id,
                        'city' => $user_address->city,
                        'state' => $user_address->state,
                        'full_address' => $user_address->full_address,
                    ]);

                }
                else{
                    toastr()->error(trans('main_translation.AddYourAddressToCreateOrder') , ' ');
                    return redirect()->back();
                }


            // Store products of order in orders_items table
            foreach ($products as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->product_name,
                    'quantity' => $item->quantity,
                    'product_price' => $item->product->product_price,
                ]);
            }

            // Send To admins after create order
            $admins = Admin::all();

            Notification::send($admins, new OrderCreatedNotification($order));

            // Delete Order after create Order
            Cart::where('user_id', $user_id)
                ->orWhere('id', $request->cookie('cart_id'))
                ->delete();

            DB::commit();

            toastr()->success(trans('messages.OrderCreatedSuccessfully') , ' ');

            return redirect()->route('website.order_details');

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

    }


    public function order_details()
    {
        $user = Auth::guard('web')->user();
        $order = Order::with('products')->where('user_id' , $user?->id)->orderBy('id' , 'DESC')->first();

        $products = OrderItem::where('order_id', $order->id)->get();

        $products_price = $products->sum(function($item) {
            return $item->product->product_price * $item->quantity;
        });
            // dd($products);

        return view('website.order' , compact('order' , 'products_price' ) );
    }

}
