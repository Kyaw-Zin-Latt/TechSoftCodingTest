<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{

    // sys user start

    public function index(){
        $users = Employee::latest("id")->paginate(10);
        return view("employees.index",compact("users"));
    }

    public function create(){
        return view("employees.create");
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required|min:4|unique:employees,name",
            "email" => "required|email|unique:employees,email",
        ]);

        $user = new Employee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route("employees.index")->with("message","Employee is created Successfully");
    }

    public function edit(Employee $employee){
        $user = $employee;
        return view("employees.edit",compact("user"));
    }

    public function update(Request $request, Employee $employee){
        $user = $employee;

        $request->validate([
            "name" => "required|min:4|unique:employees,name,".$user->id,
            "email" => "required|email|unique:employees,email,".$user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect()->route("employees.index")->with("message","Employee is updated Successfully");

    }

    public function destroy(Employee $employee){
        $user = $employee;
        $name = $user->name;
        $user->delete();

        return redirect()->route("employees.index")->with("message","$name is deleted Successfully");

    }

    public function search(Request $request){
        $users = Employee::where("name","LIKE","%$request->searchterm%")->paginate(10);

        return view("employees.index",compact('users'));
    }

    public function csvCreate(){
        return view("employees.csv-create");
    }

    public function importEmployee(Request $request){
        $request->validate([
            'csvFile' => 'required|file|mimes:csv'
        ]);

        $import = new EmployeesImport();
        $import->import($request->file('csvFile'));

        return redirect()->route("employees.index")->with("message","Employee CSV File is imported Successfully");

    }

    public function export()
    {
        return Excel::download(new EmployeesExport, 'employees.csv');
    }



}
