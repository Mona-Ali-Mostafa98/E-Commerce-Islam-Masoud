<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partners\StorePartnerRequest;
use App\Http\Requests\Partners\UpdatePartnerRequest;
use App\Models\Partner;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:List Partners|Add Partner|Update Partner|Delete Partner', ['only' => ['index','store']]);
        $this->middleware('permission:Show Partner', ['only' => ['show']]);
        $this->middleware('permission:Add Partner', ['only' => ['create','store']]);
        $this->middleware('permission:Update Partner', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Partner', ['only' => ['destroy']]);
    }

    public function index()
    {
        $site_partners = Partner:: all();
        return view('admin.partners.index', compact('site_partners'));
    }

    public function create()
    {
        $partner = new Partner() ;
        return view('admin.partners.create' , compact('partner'));
    }

    public function store(StorePartnerRequest $request)
    {
        $data = $request->except('partner_image' , '_token');
        $data['partner_image'] = $this->uploadImage($request, 'partner_image', 'partners');

        Partner::create($data);

        toastr()->success(trans('messages.AddSuccessfully'));

        return redirect()->route('admin.partners.index');

    }

    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner') );
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit' , compact('partner' ));

    }

    public function update(UpdatePartnerRequest $request , Partner $partner)
    {
        $old_image = $partner->partner_image;
        $data = $request->except('partner_image' , '_token');

        $data['partner_image'] = $this->uploadImage($request, 'partner_image', 'partners');

        if(!$request->hasFile('partner_image')){
            unset($data['partner_image']);
        }

        if ($old_image && isset($data['partner_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        $partner->update($data);

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.partners.index');
    }

    public function destroy(Partner $partner)
    {
        $partner -> delete();
        if ($partner->image) {
            Storage::disk('public')->delete($partner->image);
        }

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.partners.index');
    }

}