<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::orderBy('id' , 'DESC')->get();

        return view('website.blogs' , compact('blogs'));
    }



    public function show(Blog $blog)
    {
        $request = request();

        $another_blogs = Blog::where('id', '!=', $blog->id)->when($request->query('title') , function($query, $title) {
                $query->where('title->ar', 'LIKE', '%' . $title . '%')->orWhere('title->en', 'LIKE', '%' . $title . '%');
            })
        ->orderBy('id' , 'DESC')
        ->get();

        // $another_blogs = Blog::where('id', '!=', $blog->id)->latest()->take(10)->get();

        return view('website.blog-single', compact('blog','another_blogs') );

    }

}