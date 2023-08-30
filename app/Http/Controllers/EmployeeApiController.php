<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class EmployeeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Employee::latest("id")->get();
        return response($categories,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:4|unique:employees,name",
            "email" => "required|email|unique:employees,email",
        ]);

        $user = new Employee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response([
            "status" => "success",
            "message" =>  "Employee have been created successfully",
        ], 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->employee;
        $user = Employee::find($id);

        if(empty($user)){
            return response([
                "status" => "error",
                "message" =>  "Can not find employee with your given id",
            ], 404);
        }

        return response($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->employee;
        $user = Employee::find($id);

        if(empty($user)){
            return response([
                "status" => "error",
                "message" =>  "Can not find employee with your given id",
            ], 404);
        }

        $request->validate([
            "name" => "required|min:4|unique:employees,name,".$id,
            "email" => "required|email|unique:employees,email,".$id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return response([
            "status" => "success",
            "message" =>  "Employee have been updated successfully",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->employee;
        $user = Employee::find($id);

        if(empty($user)){
            return response([
                "status" => "error",
                "message" =>  "Can not find employee with your given id",
            ], 404);
        }

        $name = $user->name;
        $user->delete();

        return response([
            "status" => "success",
            "message" =>  "Employee have been deleted successfully",
        ], 200);

    }
}
