<?php

namespace App\Http\Requests\Blogs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBlogRequest extends FormRequest
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
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'title.ar' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',

            'brief_about_blog.ar' => 'required|string|max:255',
            'brief_about_blog.en' => 'required|string|max:255',

            'description.ar' => 'required|string',
            'description.en' => 'required|string',

            'views_number'=>'nullable|integer',

            'admin_id' => ['required','exists:admins,id'],
        ];
    }

}