<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct() {
        $this->middleware(['auth:web']);
    }


    public function wishlist()
    {
        $user =  Auth::guard('web')->user();

        $wishlists  = Wishlist::with('product')->where('user_id' ,$user->id)->orderby('id', 'desc')->get();

        return view('website.favorites' , compact('wishlists'));
    }


    public function add_product_to_wishlist(Request $request)
    {
        $user_id = Auth::guard('web')->user()?->id ;
        // dd(Product::where('id' , $request->product_id)->first()->favoriteUsers()->first()->id == $user_id)  ;
        if($user_id){
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'product_id' => 'required|exists:products,id',
            ]);

            Wishlist::create([
                'product_id' => $request->product_id,
                'user_id' =>  $user_id ,
            ]);

            return response()->json([
                'success'=> true ,
                'message' => trans('messages.AddToWishlistSuccessfully'),
            ]);

        }else {
            return response()->json([
                'error'=> true,
                'message'=> trans('messages.MustLogin'),
            ]);
        }

    }


    public function delete_product_from_wishlist($id)
    {
        $user_id = Auth::guard('web')->user()?->id ;

        $wishlist = Wishlist::where('user_id', $user_id)
                    ->where('product_id',$id)
                    ->first();

        $wishlist->delete();

        return response()->json([
            'success'=> true ,
            'message' => trans('messages.DeletedFromWishlistSuccessfully'),
        ]);

    }

}