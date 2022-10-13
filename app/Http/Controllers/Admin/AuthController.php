<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }


    public function do_login(Request $request)
    {
        $data = $request -> validate([
            'email'=> 'required|email|exists:admins,email',
            'password'=> 'required | string',
        ]);

        $admin = Admin::where('email' , $data['email'])->first();

        if($admin->status == "active"){
            if(!auth()->guard('admin')-> attempt(['email'=> $data['email'],'password'=> $data['password']]))
            {
                toastr()->error(trans('messages.LoginFailed') , ' ');

                return back();
            }
            else
            {
                toastr()->success(trans('messages.LoginSuccessfully') , ' ');

                return redirect()->route('admin.dashboard');

            }
        }else
        {
            toastr()->error(trans('messages.AccountNotActivate') , ' ');

            return back();

        }

    }



    public function logout()
    {
        auth()->guard('admin')-> logout() ;

        toastr()->error(trans('messages.LogoutSuccessfully') , ' ');

        return redirect(route('admin.login'));

    }
}