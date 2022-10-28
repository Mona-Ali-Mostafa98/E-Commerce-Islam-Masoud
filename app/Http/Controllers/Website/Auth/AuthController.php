<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\UserAddress;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                toastr()->error(trans('messages.LoginFailed') , ' ');

                return back();
            }
            else
            {
                toastr()->success(trans('messages.LoginSuccessfully') , ' ');

                return redirect(session('link'));
            }
        }else
        {
            toastr()->error(trans('messages.AccountNotActivate') , ' ');

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

        toastr()->success(trans('messages.CreatedAccountSuccessfully') , ' ');

        return redirect()->route('website.index');
    }


    public function profile()
    {
        $auth_user = Auth::guard('web')->user();

        $orders = Order::with('products')->where('user_id' , $auth_user?->id)->get();

        if($auth_user){
            $user = User::where('id', $auth_user->id)->first();

            return view('website.profile', compact('user' ,'orders'));

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

        toastr()->success(trans('messages.UpdatedAccountSuccessfully') , ' ');

        return redirect()->route('website.profile');
    }


    public function logout()
    {
        auth()->guard('web')-> logout() ;

        toastr()->success(trans('messages.LogoutSuccessfully') , ' ');

        return redirect()->back();
    }


    public function add_address_for_user(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'city' => ['required','string'],
            'state' => ['required','string'],
            'full_address' => ['required' , 'string' ],
        ]);

        $user_id = Auth::guard('web')->user()->id ;

        UserAddress::where('user_id', $user_id)->create([
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'full_address' => $data['full_address'],
                    'user_id' =>  $user_id ,
                ]);

        toastr()->success(trans('messages.AddAddressSuccessfully') , ' ');

        return redirect()->back();
    }


    public function user_address_form(UserAddress $user_address)
    {
        $user = Auth::guard('web')->user() ;

        $orders = Order::with('products')->where('user_id' , $user?->id)->get();

        return view('website.update_user_address' , compact('user_address' ,'user' , 'orders' ));
    }



    public function update_user_address(Request $request , UserAddress $user_address)
    {
        $data = $request->validate([
            'user_id' => ['sometimes' , 'required', 'exists:users,id'],
            'city' => ['sometimes' , 'required','string'],
            'state' => ['sometimes' , 'required','string'],
            'full_address' => ['sometimes' , 'required' , 'string' ],
        ]);

        $user_id = Auth::guard('web')->user()->id ;

        $user_address->update([
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'full_address' => $data['full_address'],
                    'user_id' =>  $user_id ,
                ]);

        toastr()->success(trans('messages.UpdateAddressSuccessfully') , ' ');

        return redirect()->route('website.profile');
    }

}