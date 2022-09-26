<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Offers\StoreOfferRequest;
use App\Http\Requests\Offers\UpdateOfferRequest;
use App\Models\Offer;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:List Offers|Add Offer|Update Offer|Delete Offer', ['only' => ['index','store']]);
        $this->middleware('permission:Show Offer', ['only' => ['show']]);
        $this->middleware('permission:Add Offer', ['only' => ['create','store']]);
        $this->middleware('permission:Update Offer', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Offer', ['only' => ['destroy']]);
    }

    public function index()
    {
        $offers = Offer:: all();
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        $offer = new Offer() ;
        return view('admin.offers.create' , compact('offer'));
    }

    public function store(StoreOfferRequest $request)
    {
        $data = $request->except('image' , '_token');
        $data['image'] = $this->uploadImage($request, 'image', 'offers');

        Offer::create($data);

        toastr()->success(trans('messages.AddSuccessfully'));

        return redirect()->route('admin.offers.index');

    }

    public function show(Offer $offer)
    {
        return view('admin.offers.show', compact('offer') );
    }

    public function edit(Offer $offer)
    {
        $title = $offer->getTranslations('title');

        return view('admin.offers.edit' , compact('offer' , 'title' ));

    }

    public function update(UpdateOfferRequest $request , Offer $offer)
    {
        $old_image = $offer->image;
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'offers');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        $offer->update($data);

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.offers.index');
    }

    public function destroy(Offer $offer)
    {
        $offer -> delete();
        if ($offer->image) {
            Storage::disk('public')->delete($offer->image);
        }

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.offers.index');
    }

}
