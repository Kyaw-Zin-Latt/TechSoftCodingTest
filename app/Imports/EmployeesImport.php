<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EmployeesImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $employee = Employee::find($row['id']);
            if($employee){
                $employee->name = $row['name'];
                $employee->email = $row['email'];
                $employee->update();
            } else {
                $employee = new Employee();
                $employee->name = $row['name'];
                $employee->email = $row['email'];
                $employee->save();
            }
        }
    }

    /**
     * Validation
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:4",
            "email" => "required|email",
        ];
    }
}
