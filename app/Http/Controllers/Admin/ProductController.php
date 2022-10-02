<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:Products List|Add Product|Update Product|Delete Product', ['only' => ['index','store']]);
        $this->middleware('permission:Show Product', ['only' => ['show']]);
        $this->middleware('permission:Add Product', ['only' => ['create','store']]);
        $this->middleware('permission:Update Product', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Product', ['only' => ['destroy']]);
    }

    public function index()
    {
        $request = request();
        $filters = $request->query();

        $products = Product::when($request->query('product_name'), function($query, $product_name) {
                $query->where('product_name->ar', 'LIKE', '%' . $product_name . '%')->orWhere('product_name->en', 'LIKE', '%' . $product_name . '%');
            })
            ->when($request->query('product_model'), function($query, $product_model) {
                $query->where('product_model->ar', 'LIKE', '%' . $product_model . '%')->orWhere('product_model->en', 'LIKE', '%' . $product_model . '%');
            })
            ->when($request->query('price_min'), function($query, $product_price) {
                $query->where('product_price', '>=', $product_price);
            })
            ->when($request->query('price_max'), function($query, $product_price) {
                $query->where('product_price', '<=', $product_price);
            })
            ->orderBy('id', 'DESC')
            ->paginate(30);

            return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $product = new Product() ;
        return view('admin.products.create' , compact('product'));
    }

    public function store(StoreProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->merge([
                'slug' => Str::slug($request->product_name['en'] , '-'),
            ]);

            $data = $request->except('product_image', '_token');

            $product = Product::create($data);

            // upload multiple image to product using upload image trait
            if ($images = $request->file('product_image')) {
                foreach($images as $image){
                    $imageName = time().rand(0,999). "." . $image->getClientOriginalExtension();
                    $image->storeAs('product_images', $imageName ,'public');
                    $image = ProductImage::create([
                        'product_id' => $product->id,
                        'product_image' => $imageName ,
                    ]);
                }
            }

            DB::commit();

            toastr()->success(trans('messages.AddSuccessfully'));

            return redirect()->route('admin.products.index');

        }
        catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product') );
    }

    public function edit(Product $product)
    {
        $product_name = $product->getTranslations('product_name');
        $product_model = $product->getTranslations('product_model');
        $product_details = $product->getTranslations('product_details');
        $product_description = $product->getTranslations('product_description');

        return view('admin.products.edit' , compact('product' , 'product_name' , 'product_model' , 'product_details' , 'product_description'));

    }

    public function update(UpdateProductRequest $request , Product $product)
    {
        DB::beginTransaction();
        try {
            $request->merge([
                'slug' => Str::slug($request->product_name['en'] , '-'),
            ]);

            $data = $request->except('product_image', '_token');

            if ($images = $request->file('product_image')) {
                    foreach($images as $image){
                        $imageName = time().rand(0,999). "." . $image->getClientOriginalExtension();
                        $image->storeAs('product_images', $imageName ,'public');
                        $image = ProductImage::create([
                            'product_id' => $product->id,
                            'product_image' => $imageName ,
                        ]);
                    }
            }

            if(!$request->hasFile('product_image')){
                unset($data['product_image']);
            }

            $product->update($data);

            DB::commit();

            toastr()->success(trans('messages.UpdateSuccessfully'));

            return redirect()->route('admin.products.index');

        }
        catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function destroy(Product $product)
    {
        $product -> delete();

        if ($product->product_image) {
            Storage::disk('public')->delete($product->product_image);
        }

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.products.index');
    }

}