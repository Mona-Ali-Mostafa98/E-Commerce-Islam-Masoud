<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status' ,'show')->first();

        $website_services = Service::where('status' ,'show')->latest()->take(4)->get();

        $products = Product::where('status' ,'active')->latest()->take(8)->get();

        $blogs = Blog::latest()->take(3)->get();

        $galleries = Gallery::latest()->take(5)->get();

        $best_selling_products = Product::where('best_selling' , '=' , 1)->latest()->take(8)->get();

        // $partners = Partner::where('status' ,'عرض')->latest()->get();

        return view('website.index' , compact('slider' , 'website_services' , 'products' , 'blogs' , 'galleries' , 'best_selling_products') );

    }
}