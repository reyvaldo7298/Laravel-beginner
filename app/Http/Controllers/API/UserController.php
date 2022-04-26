<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use App\Models\User;
use App\Http\Resources\UserResources;

class UserController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();
        return response()->json([UserResources::collection($data), 'User fetched!']);
    }

    public function store(Request $request)
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
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['User created successfully!', new UserResources($user)]);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new UserResources($user)]);
    }

    public function update(Request $request, User $user)
    {
        $rules = array(
            'name' => 'required',
            'phone' => 'required|regex:/(62)[0-9]/',
            'email' => 'required|email|unique:users,email,'.$user->id,
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
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return response()->json(['User updated successfully.', new UserResources($user)]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json('User deleted successfully');
    }
}
