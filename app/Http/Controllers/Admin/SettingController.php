<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateSettingRequest;
use App\Models\Setting;
use  App\Traits\UploadImageTrait ;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:Update Settings', ['only' => ['edit','update']]);
    }


    public function edit()
    {
        $setting = Setting::first() ;

        $website_name = $setting->getTranslations('website_name');
        $currency_code = $setting->getTranslations('currency_code');
        $about_services = $setting->getTranslations('about_services');
        $about_offers = $setting->getTranslations('about_offers');
        $privacy_policy = $setting->getTranslations('privacy_policy');
        $about_us_description = $setting->getTranslations('about_us_description');
        $our_vision = $setting->getTranslations('our_vision');
        $our_message = $setting->getTranslations('our_message');
        $our_goals = $setting->getTranslations('our_goals');
        $copy_footer_text = $setting->getTranslations('copy_footer_text');

        return view('admin.settings.edit', compact('setting' ,
            'website_name' , 'currency_code' , 'about_services' ,
            'about_offers' , 'privacy_policy' , 'about_us_description',
            'our_vision' , 'our_message' , 'our_goals' ,
            'copy_footer_text'
        ));
    }

    public function update (UpdateSettingRequest $request , Setting $setting)
    {
        $old_logo = $setting->website_logo;
        $old_about_us_image = $setting->about_us_image;

        $data = $request->except('about_us_image','website_logo' , '_token');

        $data['website_logo'] = $this->uploadImage($request, 'website_logo', 'settings');
        $data['about_us_image'] = $this->uploadImage($request, 'about_us_image', 'settings');

        if(!$request->hasFile('about_us_image')){
            unset($data['about_us_image']);
        }
        if(!$request->hasFile('website_logo')){
            unset($data['website_logo']);
        }

        if ($old_about_us_image && isset($data['about_us_image'])) {
            Storage::disk('public')->delete($old_about_us_image);
        }
        if ($old_logo && isset($data['website_logo'])) {
            Storage::disk('public')->delete($old_logo);
        }

        $setting->update($data);

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return back();
    }

}