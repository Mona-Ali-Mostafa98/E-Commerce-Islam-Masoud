<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CommentOnProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id' , 'DESC')->get();

        return view('website.products' , compact('products'));
    }


    public function show(Product $product)
    {
        $product_comments = $product->comments()->orderBy('id' , 'Desc')->get();

        return view('website.product-single', compact('product' , 'product_comments') );
    }


    public function store_comment(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required' , 'exists:users,id'],
            'comment' => ['required' , 'string' , 'min:10'],
        ]);

        CommentOnProduct::create($data);

        toastr()->success(trans('messages.SentCommentSuccessfully'));

        return redirect()->back();

    }


    public function best_selling_products()
    {
        $best_selling_products = Product::where('best_selling' , '=' , 1)->orderBy('id' , 'DESC')->get();

        return view('website.best-selling' , compact('best_selling_products'));
    }

}
