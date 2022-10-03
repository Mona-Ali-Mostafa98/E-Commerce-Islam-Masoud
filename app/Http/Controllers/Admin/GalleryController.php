<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Galleries\StoreGalleryRequest;
use App\Http\Requests\Galleries\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:Galleries|Add Image|Update Image|Delete Image', ['only' => ['index','store']]);
        $this->middleware('permission:Show Image', ['only' => ['show']]);
        $this->middleware('permission:Add Image', ['only' => ['create','store']]);
        $this->middleware('permission:Update Image', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Image', ['only' => ['destroy']]);
    }

    public function index()
    {
        $galleries = Gallery::orderBy('id' , 'DESC')->paginate(20);
        return view('admin.galleries.index', compact('galleries'));
    }


    public function create()
    {
        $gallery = new Gallery() ;
        return view('admin.galleries.create' , compact('gallery'));
    }


    public function store(StoreGalleryRequest $request)
    {
        $data = $request->except('image' , '_token');
        $data['image'] = $this->uploadImage($request, 'image', 'galleries');

        Gallery::create($data);

        toastr()->success(trans('messages.AddSuccessfully'));

        return redirect()->route('admin.galleries.index');

    }


    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery') );
    }


    public function edit(Gallery $gallery)
    {
        $title = $gallery->getTranslations('title');

        return view('admin.galleries.edit' , compact('gallery' , 'title'));

    }

    public function update(UpdateGalleryRequest $request,Gallery $gallery)
    {
        $old_image = $gallery->image;
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'galleries');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        $gallery->update($data);

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.galleries.index');
    }


    public function destroy(Gallery $gallery)
    {
        $gallery -> delete();
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.galleries.index');
    }
}
