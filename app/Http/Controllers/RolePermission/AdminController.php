<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Role,Permission,Role_admin};
use App\User;
use Auth;
use DB;
class AdminController extends Controller
{
    public function getIndex(){
        // dd(1);
         $admins = User::all();
         //dd($user);
         return view('admin/role_permission/admin/index',compact('admins'));
     }
     public function create(){
         $roles = Role::all();
         return view('admin/role_permission/admin/create',compact('roles'));
     }
     public function store(Request $request){
        //dd($request->name);
         $admin = new User;
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->password = bcrypt($request->password);
         $admin->save();
         $role = $request->roles;
         $admin->role()->attach($role);
         return redirect()->route('user.list');

         
     }
     public function edit($id){
         //dd($id);
         $roles = Role::all();
         $admin = User::find($id);
         $listRoles = Role_admin::where('admin_id',$id)->pluck('role_id');
         //dd($listRoles);
         return view('admin/role_permission/admin/update',compact('roles','admin','listRoles'));
     }
     public function postedit(request $request, $id){
 

             $admin = User::find($id);
             $admin->name = $request->name;
             $admin->email = $request->email;
             $admin->password = bcrypt($request->password);
             $admin->save();
             $roles = $request->roles;
             $admin->role()->sync($roles);
             return redirect()->route('user.list');
        
     }
     public function delete($id){
         $admin = User::find($id);
         $admin->delete();
         $roles = Role_admin::where('admin_id',$id)->delete();
         return redirect()->route('user.list');
     }
}
