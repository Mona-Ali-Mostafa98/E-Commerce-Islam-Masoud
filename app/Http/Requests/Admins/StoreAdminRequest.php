<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends FormRequest
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
            'name'  => 'required|string|min:10|max:255',

            'email' => ['required','email','max:255' , Rule::unique('admins')->ignore($this->admin)],

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'password' => ['required', Password::min(8) ,'max:20' , 'confirmed'],

            'password_confirmation' => ['required','same:password'],

            'mobile_number' => ['nullable','string', 'min:9' ,'max:14',Rule::unique('admins')->ignore($this->admin)],

            'status' => ['required', Rule::in(['active' , 'inactive'])] ,

            'roles_name' => 'required|array'

        ];
    }

}
