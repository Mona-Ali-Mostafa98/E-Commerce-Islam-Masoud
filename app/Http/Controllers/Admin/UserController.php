<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:List Users|Add User|Update User|Delete User', ['only' => ['index','store']]);
        $this->middleware('permission:Show User', ['only' => ['show']]);
        $this->middleware('permission:Add User', ['only' => ['create','store']]);
        $this->middleware('permission:Update User', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete User', ['only' => ['destroy']]);
    }



    public function index()
    {
        $request = request();
        $filters = $request->query();

        $fields = ['email','full_name','mobile_number'];
        $searchQuery = trim($request->query('search'));

        $users = User::where(function($query) use($searchQuery, $fields) {
            foreach ($fields as $field)
                $query->orWhere($field, 'like',  '%' . $searchQuery .'%');
            })
            ->orderBy('id', 'DESC')
            ->paginate(30);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();

        return view('admin.users.create' , compact('user'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->except('profile_image' , '_token');

        $data['profile_image'] = $this->uploadImage($request, 'profile_image', 'users');

        $data['mobile_verified'] = 1 ;  // verify mobile number

        User::create($data);

        toastr()->success(trans('messages.AddSuccessfully'));

        return redirect()->route('admin.users.index');
    }


    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request , User $user)
    {
        $old_image = $user->profile_image;
        $data = $request->except('profile_image' , '_token');

        $data['profile_image'] = $this->uploadImage($request, 'profile_image', 'users');

        if(!$request->hasFile('profile_image')){
            unset($data['profile_image']);
        }

        if($request->password){
            $data['password'] = $request->password;
        }else{
            unset($data['password']);
        }

        $user->update($data);

        if ($old_image && isset($data['profile_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.users.index');
    }



    public function destroy(User $user)
    {
        $user -> delete();
        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
        }

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.users.index');
    }


}
