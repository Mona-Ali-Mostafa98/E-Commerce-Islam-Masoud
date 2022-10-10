<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
 use UploadImageTrait;

    public function show_login_form()
    {
        if(Auth::guard('web')->user()){
            return redirect()->route('website.index');
        }

        session(['link' => url()->previous()]);

        return view('website.auth.login');
    }

    // public function username(){
    //     return 'mobile_number';
    // }

    public function login(Request $request)
    {

        $data = $request -> validate([
            'mobile_number' => ['required','string', 'min:9' ,'max:14', 'exists:users,mobile_number'],
            'password'=>[ 'required ',' string'],
        ]);

        $user = User::where('mobile_number' , $data['mobile_number'])->first();

        if($user->status == "active"){
            if(!auth()->guard('web')-> attempt(['mobile_number'=> $data['mobile_number'],'password'=> $data['password']]))
            {
                toastr()->error(trans('messages.LoginFailed'));

                return back();
            }
            else
            {
                toastr()->success(trans('messages.LoginSuccessfully'));

                return redirect(session('link'));
            }
        }else
        {
            toastr()->error(trans('messages.AccountNotActivate'));

            return back();
        }

    }


    public function show_register_form()
    {
        return view('website.auth.register');
    }


    public function register(StoreUserRequest $request)
    {
        $data = $request->all();

        $user = User::create($data);

        auth()->guard('web')->login($user); //to register and make login

        toastr()->success(trans('messages.CreatedAccountSuccessfully'));

        return redirect()->route('website.index');
    }


    public function profile()
    {
        $auth_user = Auth::guard('web')->user();

        if($auth_user){
            $user = User::where('id', $auth_user->id)->first();

            return view('website.profile', compact('user'));

        }else{
            return redirect()->route('website.show_login_form');
        }

    }


    public function update_profile(UpdateUserRequest $request , User $user)
    {
        // $user = User::where('id',Auth::user()->id)->first();
        $old_image = $user->profile_image;

        $data = $request->except('profile_image' , '_token');

        $data['profile_image'] = $this->uploadImage($request, 'profile_image', 'users');

        if(!$request->hasFile('profile_image')){
            unset($data['profile_image']);
        }

        $user->update($data);

        if ($old_image && isset($data['profile_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        toastr()->success(trans('messages.UpdatedAccountSuccessfully'));

        return redirect()->route('website.profile');
    }


    public function logout()
    {
        auth()->guard('web')-> logout() ;

        toastr()->success(trans('messages.LogoutSuccessfully'));

        return redirect()->back();
    }

}
