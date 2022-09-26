<?php

namespace App\Http\Requests\Offers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOfferRequest extends FormRequest
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
            'title.ar' => 'sometimes|required|string',
            'title.en' => 'sometimes|required|string',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>['sometimes','required' , Rule::in(['show', 'hide'])]
        ];
    }
}
