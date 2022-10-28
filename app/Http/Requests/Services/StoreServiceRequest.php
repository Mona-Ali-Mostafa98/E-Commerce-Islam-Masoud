<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServiceRequest extends FormRequest
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
            'title.ar' => 'required|string',
            'title.en' => 'required|string',

            'sup_title.ar' => 'required|string',
            'sup_title.en' => 'required|string',

            'description.ar' => 'required|string',
            'description.en' => 'required|string',

            'image' => 'required|string',

            'status'=>['sometimes','required' , Rule::in(['show', 'hide'])]
        ];
    }
}