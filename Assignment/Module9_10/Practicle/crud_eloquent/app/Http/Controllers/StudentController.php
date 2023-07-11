<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('index', compact('courses'));
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
        $request->validate([
            'roll_number' => 'required|unique:students|max:50',
            'name' => 'required',
            'phone' => 'required|integer',
            'email' => 'required|email:rfc,dns',
            'gender' => 'required|in:male,female',
            'course' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required'
        ]);
        
        $data = new Student();
        $data->roll_number = $request->roll_number;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->course_id = $request->course;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time() . "_img." . $image->getClientOriginalExtension();
            $image->move('images/upload/', $image_name);
            $data->image = $image_name;
        }
        $data->save();

        return redirect('view_records')->with('student_register_success', 'Student register successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $data = Student::join('courses', 'students.course_id', '=', 'courses.id')
                ->get(['students.*','courses.name as course_name']);
        return view('records', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student, $id)
    {
        $data = Student::find($id);
        $courses = Course::all();
        return view('edit_student', compact('data','courses'));
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
        $request->validate([
            'name' => 'required',
            'phone' => 'required|integer',
            'email' => 'required|email:rfc,dns',
            'gender' => 'required|in:male,female',
            'course' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required'
        ]);

        $data = Student::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->course_id = $request->course;

        if ($request->hasFile('image')) {
            $old_image = $data->image;
            $image = $request->image;
            $image_name = time() . "_img." . $image->getClientOriginalExtension();
            $image->move('images/upload/', $image_name);
            $data->image = $image_name;

            if(file_exists('images/upload/'.$old_image)) {
                unlink('images/upload/'.$old_image);
            }
        }
        $data->save();

        return redirect('view_records')->with('record_update_success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $id)
    {
        $data = Student::find($id);
        $old_image = $data->image;

        if(file_exists('images/upload/'.$old_image)) {
            unlink('images/upload/'.$old_image);
        }
        $data->delete();

        return redirect('view_records')->with('record_deleted_success', 'Record deleted successfully.');
    }
}
