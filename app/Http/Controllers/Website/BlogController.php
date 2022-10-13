<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::orderBy('id' , 'DESC')->get();

        return view('website.blogs' , compact('blogs'));
    }



    public function show(Blog $blog, Request $request )
    {
        $request = request();

        $another_blogs = Blog::where('id', '!=', $blog->id)->when($request->query('title') , function($query, $title) {
                $query->where('title->ar', 'LIKE', '%' . $title . '%')->orWhere('title->en', 'LIKE', '%' . $title . '%');
            })
        ->orderBy('id' , 'DESC')
        ->get();

        if(! Auth::guard('web')->check()) {                                           //guest user identified by ip
            $cookie_name = (Str::replace('.','',($request->ip())).'-'. $blog->id);
        }
        else {
            $cookie_name = (Auth::guard('web')->user()?->id.'-'. $blog->id);         //logged in user
        }

        if(Cookie::get($cookie_name) == '') {                         //check if cookie is set
            $cookie = cookie($cookie_name, '1', 60);                 //set the cookie
            $blog->incrementViewsNumber();                           //count the view
            return response()
            ->view('website.blog-single',compact('blog' , 'another_blogs'))
            ->withCookie($cookie);                                  //store the cookie
        }
        else {
            return  view('website.blog-single', compact('blog','another_blogs') );                                  //this view is not counted
        }
    }

}