<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    public function index()
    {
        // Create Role
        // Table roles
        // alternative (php artisan permission:create-role 'name-role')
        // Role::create(['name'=>'admin']);

        // Create Permission
        // $permission = Permission::create(['name'=>'Block Access']);

        // Create Role->Permission
        // Check (php artisan permission:show)
        // Table role_has_permissions
        // $role = Role::findById(2);
        // $permission = Permission::findById(3);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // Assign role to user by id
        // Table model_has_roles
        // User::find(3)->assignRole('user');
        // Remove Role by id
        // User::find(1)->removeRole('member');
        
        // return auth()->user()->hasAllRoles(Role::all());
        // return auth()->user()->getRoleNames();
        // return User::permission('Create Pegawai')->get();
        // return User::role('member')->get();

        return view('home');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $authUser = Auth::user(); 
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken; 
            // return view("dashboard", ['data' => $success['token']]);
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $rules = array(
            'name' => 'required',
            'phone' => 'required|regex:/(62)[0-9]/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        );

        $requestData = $request->all();
        $str = $requestData['phone'];
        if(substr($str, 0, 1) === '0'){
            $pattern = '/^0/';
            $phone = preg_replace($pattern, '62', $str);
        }else if(substr($str, 0, 1) === '8'){
            $pattern = '/^8/';
            $phone = preg_replace($pattern, '628', $str);
        }else {
            $phone = $str;
        }

        $requestData['phone'] = $phone;
        $request->replace($requestData);
        $values = $this->validate($request, $rules);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'phone' => $data['phone'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
