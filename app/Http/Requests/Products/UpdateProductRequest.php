<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'product_name.ar' => 'sometimes|required|string',
            'product_name.en' => 'sometimes|required|string',

            'product_model.ar' => 'sometimes|required|string',
            'product_model.en' => 'sometimes|required|string',

            'product_price' => 'sometimes|required|integer',

            'best_selling' => 'sometimes|nullable|boolean',

            'product_details.ar' => 'sometimes|required|string',
            'product_details.en' => 'sometimes|required|string',

            'product_description.ar' => 'sometimes|required|string',
            'product_description.en' => 'sometimes|required|string',

            'product_image' => 'sometimes|required|array|max:2048',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',

            'status'=>['sometimes','required' , Rule::in(['active', 'draft', 'archived'])]

        ];
    }
}