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
            'product_id' => ['required' , 'exists:products,id'],
            'user_id' => ['required' , 'exists:users,id'],
            'rate' => ['required' , 'in:1,2,3,4,5'],
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