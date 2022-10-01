<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'website_logo' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'website_name.ar' => 'sometimes|required|string',
            'website_name.en' => 'sometimes|required|string',

            'mobile_number' => 'sometimes|required|min:9|max:14',
            'email' => 'sometimes|required|email',

            'currency_code.ar' => 'sometimes|required|string',
            'currency_code.en' => 'sometimes|required|string',

            'tax' => 'nullable|integer',

            'about_services.ar' => 'sometimes|required|string',
            'about_services.en' => 'sometimes|required|string',

            'about_offers.ar' => 'sometimes|required|string',
            'about_offers.en' => 'sometimes|required|string',

            'privacy_policy.ar' => 'sometimes|required|string',
            'privacy_policy.en' => 'sometimes|required|string',

            'about_us_description.ar' => 'sometimes|required|string',
            'about_us_description.en' => 'sometimes|required|string',
            'about_us_image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'our_vision.ar' => 'sometimes|required|string',
            'our_vision.en' => 'sometimes|required|string',

            'our_message.ar' => 'sometimes|required|string',
            'our_message.en' => 'sometimes|required|string',

            'our_goals.ar' => 'sometimes|required|string',
            'our_goals.en' => 'sometimes|required|string',

            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'whatsapp_number' => 'nullable|min:9|max:14',

            'copy_footer_text.ar' => 'sometimes|required|string',
            'copy_footer_text.en' => 'sometimes|required|string',
        ];
    }

}