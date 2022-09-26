<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sliders\StoreSliderRequest;
use App\Http\Requests\Sliders\UpdateSliderRequest;
use App\Models\Slider;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:List Sliders|Add Slider|Update Slider|Delete Slider', ['only' => ['index','store']]);
        $this->middleware('permission:Show Slider', ['only' => ['show']]);
        $this->middleware('permission:Add Slider', ['only' => ['create','store']]);
        $this->middleware('permission:Update Slider', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Slider', ['only' => ['destroy']]);
    }

    public function index()
    {
        $sliders = Slider:: all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        $slider = new Slider() ;
        return view('admin.sliders.create' , compact('slider'));
    }

    public function store(StoreSliderRequest $request)
    {
        $data = $request->except('image' , '_token');
        $data['image'] = $this->uploadImage($request, 'image', 'sliders');

        Slider::create($data);

        toastr()->success(trans('messages.AddSuccessfully'));

        return redirect()->route('admin.sliders.index');

    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider') );
    }

    public function edit(Slider $slider)
    {
        $title = $slider->getTranslations('title');
        $description = $slider->getTranslations('description');

        return view('admin.sliders.edit' , compact('slider' , 'title' , 'description'));

    }

    public function update(UpdateSliderRequest $request , Slider $slider)
    {
        $old_image = $slider->image;
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'sliders');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        $slider->update($data);

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.sliders.index');
    }

    public function destroy(Slider $slider)
    {
        $slider -> delete();
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.sliders.index');
    }

}
