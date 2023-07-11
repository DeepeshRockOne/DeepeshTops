<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Mail\welcomemail;
use Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registration');
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
            'name' => 'required',
            'username' => 'required|unique:employees',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:3|max:12',
            'cpassword' => 'required|same:password',
            'gender' => 'required|in:male,female',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->password == $request->cpassword) {
            $data = new Employee();
            $data->name = $request->name;
            $data->username = $request->username;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->password = $request->password;
            $data->gender = $request->gender;

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $image_name = time()."_img.".$image->getClientOriginalExtension();
                $image->move('images/employee/', $image_name);
                $data->image = $image_name;
            }

            $data->address = $request->address;
            $data->save();

            $name = $request->name;
            $email = $request->email;
            $emailData = array('name'=>$name, 'email'=>$email);

            Mail::to($email)->send(new welcomemail($emailData));

            return redirect('/')->with('register_success', 'Employee registration successfull and email sent.');
        } else {
            return redirect('/')->with('register_error', 'Password and Confirm Password should be same.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $data = Employee::all();
        return view('view_employees', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
