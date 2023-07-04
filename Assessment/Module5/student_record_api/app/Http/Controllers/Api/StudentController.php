<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:150',
            'course' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $data = new Student();
            $data->name = $request->name;
            $data->course = $request->course;
            $data->save();

            return response()->json([
                'status' => 200,
                'message' => 'Student registered successfully'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student = Student::all();

        if ($student->count() > 0) {
            return response()->json([
                'status' => 200,
                'students' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No record found'
            ], 404);
        }
    }

    public function getSingle(Student $student, $id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such student found'
            ], 404);
        }
    }

    public function search(Student $student, $key)
    {
        $data = Student::where('name','LIKE','%'.$key.'%')
                        ->orWhere('course','LIKE','%'.$key.'%')
                        ->get();

        if ($data->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such data found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:150',
            'course' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Student::find($id);

            if ($student) {
                $student->name = $request->name;
                $student->course = $request->course;
                $student->save();
    
                return response()->json([
                    'status' => 200,
                    'message' => 'Student updated successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No such student found'
                ], 404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Student deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such student found'
            ], 404);
        }
    }
}
