<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'product_name.ar' => 'required|string',
            'product_name.en' => 'required|string',

            'product_model.ar' => 'required|string',
            'product_model.en' => 'required|string',

            'product_price' => 'required|integer',

            'best_selling' => 'nullable|boolean',

            'product_details.ar' => 'required|string',
            'product_details.en' => 'required|string',

            'product_description.ar' => 'required|string',
            'product_description.en' => 'required|string',

            'product_image' => 'required|array|max:2048',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',

            'status'=>['sometimes','required' , Rule::in(['active', 'draft', 'archived'])]

        ];
    }
}