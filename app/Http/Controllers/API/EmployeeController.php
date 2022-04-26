<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use App\Models\Image;
use App\Models\Employee;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::latest()->get();
        return response()->json([EmployeeResource::collection($data), 'Employee fetched!']);
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        if (is_null($employee)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new EmployeeResource($employee)]);
    }

    public function store(Request $request)
    {
        $rules = array(
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'required',
            'position_id' => 'required',
            'address' => 'required',
            'image_id' => 'required',
            'hobby' => 'required',
        );

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $store = Employee::create([
            'name' => $request->name,
            'position_id' => $request->position_id,
            'address' => $request->address,
            'image_id' => $request->image
        ]);

        $employee = Employee::find(2);

        $image = new Image;
        $image->name = $request->image;
        $image->image = $request->image;

        $employee->image()->save($image);

        $store->hobi()->sync( $request->hobby );

        return response()->json(['User created successfully!', new EmployeeResource($store)]);
    }
}
