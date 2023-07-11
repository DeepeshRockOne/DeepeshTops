<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = Department::paginate(2);
        return view('departments', compact('data'));
    }
}
