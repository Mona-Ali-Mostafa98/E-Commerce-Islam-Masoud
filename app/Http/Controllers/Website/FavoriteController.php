<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user =  Auth::guard('web')->user();

        $favorite_products = Wishlist::where('user_id' ,$user->id)->latest()->take(4)->get();

        return view('website.favorites' , compact('favorite_products'));
    }
}