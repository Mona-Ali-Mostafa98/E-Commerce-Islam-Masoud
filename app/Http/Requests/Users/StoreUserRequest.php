<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'full_name' => 'required|string|min:10|max:255',

            'email' => ['nullable' ,'email','max:255' , Rule::unique('users')->ignore($this->user)],

            'mobile_number' => ['required','string', 'min:9' ,'max:14', Rule::unique('users')->ignore($this->user)],

            'password' => ['required', Password::min(8) ,'max:20' , 'confirmed'],
            'password_confirmation' => ['required','same:password'],

            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'receive_notifications' =>'nullable',

            'status' => ['required', Rule::in(['active', 'inactive'])] ,

            'mobile_verified' =>'nullable',

        ];
    }

}
