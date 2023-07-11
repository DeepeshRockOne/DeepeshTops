<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::join('departments','employees.department_id', '=', 'departments.id')
                        ->orderBy('id', 'asc')
                        ->paginate(5,['employees.*', 'departments.name as department_name']);
        return view('employees', compact('data'));
    }
}
