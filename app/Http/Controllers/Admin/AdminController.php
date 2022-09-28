<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\StoreAdminRequest;
use App\Http\Requests\Admins\UpdateAdminRequest;
use App\Models\Admin;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    use UploadImageTrait;

    function __construct()
    {
        $this->middleware('permission:List Admins|Add Admin|Update Admin|Delete Admin', ['only' => ['index','store']]);
        $this->middleware('permission:Show Admin', ['only' => ['show']]);
        $this->middleware('permission:Add Admin', ['only' => ['create','store']]);
        $this->middleware('permission:Update Admin', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Admin', ['only' => ['destroy']]);
    }


    public function index()
    {

        $request = request();
        $filters = $request->query();

        $fields = ['email','name','mobile_number'];
        $searchQuery = trim($request->query('search'));

        $admins = Admin::where(function($query) use($searchQuery, $fields) {
            foreach ($fields as $field)
                $query->orWhere($field, 'like',  '%' . $searchQuery .'%');
            })
            ->orderBy('id', 'DESC')
            ->paginate(30);

        return view('admin.admins.index', compact('admins'));
    }


    public function create()
    {
        $admin = new Admin();
        // $roles = Role::pluck('name','name')->all();
        $roles = Role::all();

        return view('admin.admins.create' , compact('admin' , 'roles' ));
    }


    public function store(StoreAdminRequest $request)
    {

        $data = $request->except('image' , '_token');
        $data['image'] = $this->uploadImage($request, 'image', 'admins');

        $admin = Admin::create($data);
        $admin->assignRole($request->input('roles_name'));

        toastr()->success(trans('messages.AddSuccessfully'));

        return redirect()->route('admin.admins.index');

    }


    public function show(Admin $admin)
    {
        return view('admin.admins.show', compact('admin'));
    }


    public function edit(Admin $admin)
    {
        $roles = Role::all();
        $adminRole = $admin->roles->all();

        return view('admin.admins.edit', compact('admin' , 'roles' ,'adminRole' ));
    }


    public function update(UpdateAdminRequest $request , Admin $admin)
    {

        $old_image = $admin->image;
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'admins');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $admin->update($data);

        DB::table('model_has_roles')->where('model_id',$admin->id)->delete();

        $admin->assignRole($request->input('roles_name'));

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.admins.index');
    }


    public function destroy(Admin $admin)
    {
        $admin -> delete();
        if ($admin->image) {
            Storage::disk('public')->delete($admin->image);
        }

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.admins.index');
    }

}