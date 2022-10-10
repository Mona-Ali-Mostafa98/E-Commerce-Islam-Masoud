<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{

// this function use to change password for auth user
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        $auth_user = Auth::guard('web')->user();

        // dd(!Hash::check($request->current_password, $auth_user->password)); =>false

        // Match The Old Password
        if(!Hash::check($request->current_password, $auth_user->password)){

            toastr()->error(trans('messages.CurrentPasswordNotMatch'));
            return redirect()->back();
        }

        $user = User::where('id', $auth_user->id)->first();

        $user->update([
            'password' => $request->password
        ]);

        toastr()->success(trans('messages.PasswordUpdatedSuccessfully'));

        auth()->guard('web')-> logout() ;

        return redirect()->route('website.show_login_form');

    }

}