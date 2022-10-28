<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
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

            'sup_title.ar' => 'sometimes|required|string',
            'sup_title.en' => 'sometimes|required|string',

            'description.ar' => 'sometimes|required|string',
            'description.en' => 'sometimes|required|string',

            'image' => 'sometimes|required|string',
            'status'=>['sometimes','required' , Rule::in(['show', 'hide'])]
        ];
    }
}