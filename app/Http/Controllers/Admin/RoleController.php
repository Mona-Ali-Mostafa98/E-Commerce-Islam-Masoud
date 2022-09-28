<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:List Roles|Add Role|Update Role|Delete Role', ['only' => ['index','store']]);
        $this->middleware('permission:Show Role', ['only' => ['show']]);
        $this->middleware('permission:Add Role', ['only' => ['create','store']]);
        $this->middleware('permission:Update Role', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Role', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        $roles = Role::orderBy('id','ASC')->paginate(5);
        return view('admin.roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $role = new Role();
        $permissions = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.create',compact('permissions' , 'role' , 'rolePermissions'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name|string|max:255',
            'permission' => 'array|required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        toastr()->success(trans('messages.AddSuccessfully'));

        return redirect()->route('admin.roles.index');
    }


    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('admin.roles.show',compact('role','rolePermissions'));
    }


    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();   //return array of ids of permission of role

    return view('admin.roles.edit',compact('role','permissions','rolePermissions' ));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.roles.index');
    }


    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.roles.index');
    }
}