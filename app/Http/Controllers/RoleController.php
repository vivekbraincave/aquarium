<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\WebsiteSetting;
use DB;

class RoleController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:role-list|role-create', ['only' => ['index','store', 'create']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::all();
        $settings = WebsiteSetting::first();
        return view('admin.roles.index', compact('roles', 'settings'));
    }

    public function create()
    {
        $permission = Permission::get();
        $settings = WebsiteSetting::first();
        return view('admin.roles.create',compact('permission', 'settings'));
    }

    public function store(Request $request)
    {
        $customErrorMessages = [
            'name.required' => 'The role name is required.',
            'name.unique' => 'The role name must be unique.',
            'permission.required' => 'Please select at least one permission.',
        ];

        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ], $customErrorMessages);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')
                        ->with('success', 'New Role created successfully');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $settings = WebsiteSetting::first();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit',compact('role','permission','rolePermissions', 'id', 'settings'));
    }

    public function update(Request $request, $id)
    {
        $customErrorMessages = [
            'name.required' => 'The role name is required.',
            'name.unique' => 'The role name must be unique.',
            'permission.required' => 'Please select at least one permission.',
        ];

        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$id,
            'permission' => 'required',
        ], $customErrorMessages);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('admin.roles.index')
                        ->with('success', 'Role deleted successfully');   
    }


}