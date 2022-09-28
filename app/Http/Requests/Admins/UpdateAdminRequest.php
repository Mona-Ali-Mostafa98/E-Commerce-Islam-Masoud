<?php

namespace App\Http\Requests\Admins;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
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
            'name' => ['sometimes','required','string','min:10','max:255'],

            'email' => ['sometimes','required' ,'email','max:255' , Rule::unique('admins')->ignore($this->admin)],

            'image' => ['sometimes','nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],

            'mobile_number' => ['nullable','string', 'min:9' ,'max:14', Rule::unique('admins')->ignore($this->admin)],  //'regex:/^(009665|9665|\+9665|05|5)([013456789])([0-9]{7})$/' , =>(009665|9665|\+9665|05|5)  ((5|0|3|6|4|9|1|8|7)مفتاح الشركه) (خانات)

            'password' => ['sometimes' , 'nullable', Password::min(8) ,'max:20', 'confirmed'],
            'password_confirmation' => ['sometimes' ,  'nullable','same:password'],

            'status' => ['sometimes','required', Rule::in(['active' , 'inactive'])] ,

            'roles_name' => ['sometimes','required','array']
        ];
    }
}