<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Role,Permission,Role_admin,Role_permission};
use App\User;
use DB;
class PermissionController extends Controller
{
    public function getIndex(){
        $permissions = Permission::all();
        return view('admin/role_permission/permission/index',compact('permissions'));
    }
    public function create(){
        return view('admin/role_permission/permission/create');
    }
    public function store(Request $request){
       $permission = Permission::create($request->all());      
    return redirect()->route('permission.list');

    }

    public function edit($id){
        
     $permission = Permission::find($id);
        return view('admin/role_permission/permission/update',compact('permission'));
    }
 public function postedit(Request $request ,$id){
     $permission = Permission::find($id);
     $permission->update($request->all());
     return redirect()->route('permission.list');
    }
     
     

    public function delete($id){
     $permission = Permission::find($id);
     $permission->delete();
     $permission_id = Role_permission::where('permission_id',$id)->delete();
     return redirect()->route('permission.list');
 }

}
