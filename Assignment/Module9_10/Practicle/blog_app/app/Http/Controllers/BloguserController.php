<?php

namespace App\Http\Controllers;

use App\Models\Bloguser;
use Illuminate\Http\Request;
use Hash;
use Session;

class BloguserController extends Controller
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

    public function login()
    {
        return view('login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3|max:12'
        ]);

        $username = $request->username;
        $data = Bloguser::where('username', $username)->first();

        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                session()->put('userid', $data->id);
                session()->put('uname', $data->name);
                session()->put('username', $data->username);
                return redirect('view_blogs')->with('loging_success', 'Login successfully.');
            } else {
                return redirect()->back()->with('login_fail', 'Password not valid.');
            }
        } else {
            return redirect()->back()->with('login_fail', 'Username not valid.');
        }
    }

    public function logout()
    {
        session()->pull('userid');
        session()->pull('uname');
        session()->pull('username');
        return redirect('/')->with('logout_success', 'Logout successfully.');
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
            'username' => 'required|unique:blogusers',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:3|max:12',
            'cpassword' => 'required|same:password',
            'gender' => 'required|in:male,female',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->password == $request->cpassword) {
            $data = new Bloguser();
            $data->name = $request->name;
            $data->username = $request->username;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->gender = $request->gender;
            $data->language = implode(",", $request->language);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $image_name = time() . '_img.' . $image->getClientOriginalExtension();
                $image->move('images/users/', $image_name);
                $data->image = $image_name;
            }

            $data->address = $request->address;
            $data->save();

            return redirect('login')->with('register_success', 'Registration success, please login.');
        } else {
            return redirect('registration')->with('register_error', 'Password and Confirm Password should be same.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bloguser  $bloguser
     * @return \Illuminate\Http\Response
     */
    public function show(Bloguser $bloguser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bloguser  $bloguser
     * @return \Illuminate\Http\Response
     */
    public function edit(Bloguser $bloguser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bloguser  $bloguser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bloguser $bloguser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bloguser  $bloguser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bloguser $bloguser)
    {
        //
    }
}
