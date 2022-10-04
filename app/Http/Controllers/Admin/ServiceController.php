<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Services\StoreServiceRequest;
use App\Http\Requests\Services\UpdateServiceRequest;
use App\Models\Service;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:Services List|Add Service|Update Service|Delete Service', ['only' => ['index','store']]);
        $this->middleware('permission:Show Service', ['only' => ['show']]);
        $this->middleware('permission:Add Service', ['only' => ['create','store']]);
        $this->middleware('permission:Update Service', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Service', ['only' => ['destroy']]);
    }

    public function index()
    {
        $website_services = Service:: all();
        return view('admin.services.index', compact('website_services'));
    }

    public function create()
    {
        $service = new Service() ;
        return view('admin.services.create' , compact('service'));
    }

    public function store(StoreServiceRequest $request)
    {
        $data = $request->except('image' , '_token');
        $data['image'] = $this->uploadImage($request, 'image', 'services');

        Service::create($data);

        toastr()->success(trans('messages.AddSuccessfully'));

        return redirect()->route('admin.services.index');

    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service') );
    }

    public function edit(Service $service)
    {
        $title = $service->getTranslations('title');
        $sup_title = $service->getTranslations('sup_title');
        $description = $service->getTranslations('description');

        return view('admin.services.edit' , compact('service' , 'title' , 'sup_title' , 'description'));

    }

    public function update(UpdateServiceRequest $request , Service $service)
    {
        $old_image = $service->image;
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'services');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        $service->update($data);

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.services.index');
    }

    public function destroy(Service $service)
    {
        $service -> delete();
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.services.index');
    }

}