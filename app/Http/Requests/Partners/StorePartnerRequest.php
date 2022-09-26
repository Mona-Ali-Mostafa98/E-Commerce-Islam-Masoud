<?php

namespace App\Http\Requests\Partners;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePartnerRequest extends FormRequest
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
            'partner_name' => ['required','string' , Rule::unique('partners')->ignore($this->partner)],
            'partner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>['required' ,  Rule::in(['show', 'hide'])]
        ];
    }

}