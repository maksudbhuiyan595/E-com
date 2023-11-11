<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\rolePermission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view("backend.layouts.roles.index", compact("roles"));
    }
    public function create()
    {
        return view("backend.layouts.roles.create");
    }
    public function store(Request $request)
    {
        $request->validate([

            "name"=> "required",
        ]);
        Role::create([
            "name"=> $request->name,
        ]);
        toastr()->success("successfully created");
        return redirect()->route("role.index");
    }
    public function edit($roleId)
    {
        // dd($roleId);
        $role = Role::findOrFail($roleId);
        return view("backend.layouts.roles.edit", compact("role"));
    }
    public function update(Request $request, $roleId)
    {
        $request->validate([
            "name"=> "required",

        ]);
        $role = Role::findOrFail($roleId);
        $role->name = $request->name;
        $role->save();
        toastr()->success("successfully updated");
        return redirect()->route("role.index");
    }
    public function destroy($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->delete();
        toastr()->success("successfully deleted");
        return redirect()->route("role.index");
    }
    public function assign ($roleId)
    {
        $role = Role::with('permissions')->find($roleId);
        $assignPermissions=$role->permissions->pluck('permission_id')->toArray();//data convert for array 
        $permissions= Permission::all();
        return view('backend.layouts.roles.assign', compact('role','permissions','assignPermissions'));
    }
    public function rolePermission(Request $request , $roleId)
    {
        $validate= $request->validate([
            'permission'=> 'required',
        ]);

       RolePermission::where('role_id',$roleId)->delete(); //after convert
       foreach($request->permission as $permission)
       {
           RolePermission::create([
               'permission_id'=>$permission,
               'role_id'=>$roleId,
           ]);
       }
           toastr()->success('successfully created role permissions');
           return redirect()->back();
    }
}
