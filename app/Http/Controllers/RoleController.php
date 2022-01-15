<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $role = Role::orderBy('id','DESC')->get();
        $permissions = [];
        $roleManagement = Permission::orderBy('id','DESC')->get();
        foreach ($roleManagement as $key => $value) {
            $permissions[$value['module_name']][$value['id']] = $value['display_name'];
        }
        return view('backend.Setup.role_list',compact('role','permissions'));
    }

    public function create()
    {
        $permissions = [];
        $roleManagement = Permission::all();
        foreach ($roleManagement as $key => $value) {
            $permissions[$value['module_name']][$value['id']] = $value['display_name'];
        }
        return view('backend.Setup.role_create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:roles,name',
            'display_name'  => 'required',
            // 'permission'    => 'required',
        ]);
        $role = Role::create([
                        'name'          => $request->input('name'),
                        'display_name'  => $request->input('display_name')
                    ]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('role.index');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                                    ->where("role_has_permissions.role_id",$id)
                                    ->get();
        return view('roles.show',compact('role','rolePermissions'));
    }

    public function edit(Request $request)
    {
        // $role = Role::where('id', $request->id)->get();
        // $permission = Permission::all();
        // $rolePermissions = DB::table("role_has_permissions")
        //                 ->where("role_has_permissions.role_id", $request->id)
        //                 ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //                 ->all();
        $id = $request->id;
        $role = Role::find($id);
        $permissions = [];
        $roleManagement = Permission::all();
        $role_permissions = $role->getAllPermissions()->pluck('id','id')->toArray();
        foreach ($roleManagement as $key => $value) {
            $permissions[$value['module_name']][$value['id']] = $value['display_name'];
        }
        return view('backend.Setup.role_edit',compact('role','permissions','role_permissions'));
        // return response()->json($role);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'display_name'  => 'required',
            // 'permission'    => 'required',
        ]);
        $role = Role::find($request->id);
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('role.index');
    }

}
