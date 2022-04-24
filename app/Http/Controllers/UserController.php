<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function showData(){
        $users = User::all();
        return view('User.Data', ['users'=> $users]);
    }

    public function editData($id)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $users = User::find($id);
        return view('User.Edit', ['users'=> $users, 'permissions'=>$permissions, 'roles'=>$roles]);
    }

    public function storeData(Request $request)
    {
        $user = User::find($request->id);
        $input = $request->all();
        $permissions['permissions'] = $request->input('permission');
        $roles['roles'] = $request->input('role');
        $user->syncPermissions($permissions['permissions']);
        $user->syncRoles($roles['roles']);
        return redirect('data-user');
    }

    public function updateData(Request $request)
    {
        $permissions = $request->all();
        $permissions['permission'] = $request->input('permission');
        $user = $request->id;
        $user->syncPermissions($permissions);

        $users = User::all();
        return view('User.Data', ['users'=> $users]);
    }
}
