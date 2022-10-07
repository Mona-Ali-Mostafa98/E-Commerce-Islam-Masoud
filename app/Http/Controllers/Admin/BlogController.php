<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blogs\StoreBlogRequest;
use App\Http\Requests\Blogs\UpdateBlogRequest;
use App\Models\Blog;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:Blogs List|Add Blog|Update Blog|Delete Blog', ['only' => ['index','store']]);
        $this->middleware('permission:Show Blog', ['only' => ['show']]);
        $this->middleware('permission:Add Blog', ['only' => ['create','store']]);
        $this->middleware('permission:Update Blog', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Blog', ['only' => ['destroy']]);
    }

    public function index()
    {
        $request = request();
        $filters = $request->query('title');

        $blogs = Blog::when($filters , function($query, $title) {
                $query->where('title->ar', 'LIKE', '%' . $title . '%')->orWhere('title->en', 'LIKE', '%' . $title . '%');
            })
            ->orderBy('id', 'DESC')
            ->paginate(30);

            return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $blog = new Blog() ;
        return view('admin.blogs.create' , compact('blog'));
    }

    public function store(StoreBlogRequest $request)
    {
        $data = $request->except('cover_image' , 'image', '_token');
        $data['cover_image'] = $this->uploadImage($request, 'cover_image', 'blogs');
        $data['image'] = $this->uploadImage($request, 'image', 'blogs');

        Blog::create($data);

        toastr()->success(trans('messages.AddSuccessfully'));

        return redirect()->route('admin.blogs.index');

    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog') );
    }

    public function edit(Blog $blog)
    {
        $title = $blog->getTranslations('title');
        $description = $blog->getTranslations('description');
        $brief_about_blog = $blog->getTranslations('brief_about_blog');

        return view('admin.blogs.edit' , compact('blog' , 'title' , 'description' , 'brief_about_blog'));

    }

    public function update(UpdateBlogRequest $request , Blog $blog)
    {
        $old_cover_image = $blog->cover_image;
        $old_image = $blog->image;

        $data = $request->except('cover_image' , 'image', '_token');

        $data['cover_image'] = $this->uploadImage($request, 'cover_image', 'blogs');
        $data['image'] = $this->uploadImage($request, 'image', 'blogs');

        if(!$request->hasFile('cover_image')){
            unset($data['cover_image']);
        }

        if ($old_cover_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_cover_image);
        }

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        $blog->update($data);

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.blogs.index');
    }

    public function destroy(Blog $blog)
    {
        $blog -> delete();

        if ($blog->cover_image) {
            Storage::disk('public')->delete($blog->cover_image);
        }
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.blogs.index');
    }

}