<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Subscribe;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status' ,'show')->latest()->take(3)->get();

        $website_services = Service::where('status' ,'show')->orderBy('id' , 'desc')->take(3)->get();

        $products = Product::where('status' , 'active')->latest()->take(8)->get();

        // $products = Product::where('status' , 'active')
        //     ->withCount([
        //         'favoriteUsers as favorite' => function($query) {
        //             $query->where('id', '=', Auth::guard('web')->user()?->id);
        //         }
        //     ])
        //     ->latest()->take(8)->get();

        $blogs = Blog::latest()->take(3)->get();

        $galleries = Gallery::latest()->take(5)->get();

        $best_selling_products = Product::where('best_selling' , '=' , 1)->latest()->take(8)->get();

        return view('website.index' , compact('sliders' , 'website_services' , 'products' , 'blogs' , 'galleries' , 'best_selling_products') );

    }


    public function store_subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => ['required','string' , 'email'],
        ]);

        Subscribe::create($data);

        toastr()->success(trans('messages.SentSubscribeSuccessfully') , ' ');

        return redirect()->route('website.index');

    }


    public function search()
    {
        $request = request();
        $filters = $request->query();

        $products = Product::when($request->query('product_name'), function($query, $product_name) {
            $query->where('product_name->ar', 'LIKE', '%' . $product_name . '%')->orWhere('product_name->en', 'LIKE', '%' . $product_name . '%');
        })
            ->orderBy('id', 'DESC')
            ->paginate(30);
        if ($request->filled('product_name')) {
            return view('website.products', compact('products'));
        }else{
            return redirect()->back();
        }
    }

}