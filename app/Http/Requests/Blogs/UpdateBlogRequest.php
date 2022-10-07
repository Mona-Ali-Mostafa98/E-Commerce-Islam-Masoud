<?php

namespace App\Http\Requests\Blogs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'cover_image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'title.ar' => 'sometimes|required|string|max:255',
            'title.en' => 'sometimes|required|string|max:255',

            'brief_about_blog.ar' => 'sometimes|required|string|max:255',
            'brief_about_blog.en' => 'sometimes|required|string|max:255',

            'description.ar' => 'sometimes|required|string',
            'description.en' => 'sometimes|required|string',

            'views_number'=> 'sometimes|nullable|integer',

            'admin_id' => ['sometimes' , 'required','exists:admins,id'],

        ];
    }
}