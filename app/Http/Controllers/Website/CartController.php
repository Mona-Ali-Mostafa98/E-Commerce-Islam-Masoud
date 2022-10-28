<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();

        return view('website.cart' , compact('user') );
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'int' , 'exists:products,id'],
            'quantity' => ['int', 'min:1'],
        ]);

        Cart::updateOrCreate([
            'id' => $this->getCartId(),
            'product_id' => $request->post('product_id'),
        ], [
            'quantity' => DB::raw('quantity + ' . $request->post('quantity', 1)),
            'user_id' => Auth::guard('web')->user()?->id,
        ]);

        toastr()->success(trans('messages.AddToCartSuccessfully') , ' ');

        return redirect()->back();

    }


    public function update(Request $request)
    {
        $request->validate([
            // 'quantity' => ['required', 'array'],
            'quantity' => ['required', 'int', 'min:1'],
        ]);

        $cart = Cart::where('id', '=', $this->getCartId())
            -> where('product_id', '=', $request->id )->first();
            // ->update([
            //     'quantity' => $request->post('quantity'),

            // ]);
        $cart->quantity = $request->post('quantity');
        $cart->update();

        $total_price_before_tax = $cart->quantity * $cart->product->product_price;

        $settings = Setting::first();

        $tax_ratio = $settings->tax ;
        $shipping_price = $settings->shipping_price ;

        $tax = $total_price_before_tax * $tax_ratio / 100;

        $total_price_after_tax = $total_price_before_tax + $tax ;

        $total_price_after_shipping_price = $total_price_after_tax + $shipping_price;


        return response()->json([
            'success'=> true ,
            'total_price_before_tax' => $total_price_before_tax,
            'total_price_after_tax' => $total_price_after_tax ,
            'total_price_after_shipping_price' => $total_price_after_shipping_price
        ]);

    }


    public function destroy()
    {
        Cart::where('id', '=', $this->getCartId())->orWhere('user_id', Auth::id())->delete();
        $cookie = Cookie::make('cart_id', '', -60);
        return redirect()->back()->with('success', "Cart cleared successfully")->cookie($cookie);
    }



    public function delete_product_from_cart(Product $product)
    {
        $product_item = Cart::where('id', '=', $this->getCartId())->where('product_id', '=', $product->id)->first();

        $product_item->delete($product->id);

        return redirect()->back();
    }


    protected function getCartId()
    {
        $id = request()->cookie('cart_id');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_id', $id , 30 * 24 * 60);
        }
        return $id;
    }

}
