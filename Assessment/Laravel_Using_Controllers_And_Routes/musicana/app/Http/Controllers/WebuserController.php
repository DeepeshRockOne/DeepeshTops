<?php

namespace App\Http\Controllers;

use App\Models\Webuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Mail;

class WebuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.user_registration');
    }

    public function userLogin()
    {
        return view('website.user_login');
    }

    public function userLoginAuth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $data = Webuser::where('username', $username)->first();

        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                if ($data->status == "Block") {
                    return redirect('/user_login')->with('fail', 'Login failed due to block account.');
                } else {
                    session()->put('userid', $data->id);
                    session()->put('uname', $data->name);
                    session()->put('username', $data->username);
                    return redirect('/')->with('success', 'Login successfully.');
                }
            } else {
                return redirect('/user_login')->with('fail', 'Password not valid.');
            }
        } else {
            return redirect('/user_login')->with('fail', 'Username not valid.');
        }
    }

    public function userLogout()
    {
        session()->pull('userid');
        session()->pull('uname');
        session()->pull('username');
        
        return redirect('/')->with('success', 'Logout successfully.');
    }

    public function userForgotPassword()
    {
        return view('website.user_forgot_password');
    }

    public function userProfile()
    {
        if (session()->has('userid')) {
            $userId = session()->get('userid');
            $data = Webuser::where('id', $userId)->first();

            if ($data) {
                return view('website.user_profile', compact('data'));
            } else {
                return redirect('/')->with('fail', 'Requested user profile is not available.');
            }
        } else {
            return redirect('/user_login')->with('fail', 'Please login first.');
        }
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
            'username' => 'required|unique:webusers',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:3|max:12',
            'cpassword' => 'required|same:password',
            'gender' => 'required|in:Male,Female',
            'language' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        if ($request->password == $request->cpassword) {
            $data = new Webuser();
            $data->name = $request->name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->gender = $request->gender;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '_img.' . $image->getClientOriginalExtension();
                $image->move('website/upload/images/user/', $image_name);
                $data->image = $image_name;
            }

            $data->language = implode(",", $request->language);
            $data->save();

            /* $name = $request->name;
            $email = $request->email;
            $emailData = array('name'=>$name, 'email'=>$email);

            Mail::to($email)->send(new welcomemail($emailData)); */

            return redirect('/user_login')->with('success', 'Registration success, please login.');
        } else {
            return redirect('/register')->with('fail', 'Password and Confirm Password should be same.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function show(Webuser $webuser)
    {
        $data = Webuser::all();

        return view('admin.user_details', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Webuser $webuser)
    {
        //
    }

    public function editUser(Webuser $webuser, $editid)
    {
        $data = Webuser::find($editid);

        if (!empty($data)) {
            return view('website.edit_user_profile', compact('data'));
        } else {
            return redirect('/user_profile')->with('fail', 'Requested user profile is not available for edit.');
        }
    }

    public function updateUser(Request $request, Webuser $webuser, $editid)
    {
        $data = Webuser::find($editid);

        if (!empty($data)) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email:rfc,dns',
                'gender' => 'required|in:Male,Female',
                'language' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);

            $data->name = $request->name;
            $data->email = $request->email;
            $data->gender = $request->gender;

            if ($request->hasFile('image')) {
                $old_image = $data->image;

                $image = $request->file('image');
                $image_name = time() . '_img.' . $image->getClientOriginalExtension();
                $image->move('website/upload/images/user/', $image_name);

                if (file_exists('website/upload/images/user/'.$old_image)) {
                    unlink('website/upload/images/user/'.$old_image);
                }

                $data->image = $image_name;
            }

            $data->language = implode(",", $request->language);
            $data->save();

            return redirect('/user_profile')->with('success', 'User profile updated successfully.');
        } else {
            return redirect('/user_profile')->with('fail', 'Requested user profile is not available for update.');
        }
    }

    public function updateUserStatus(Webuser $webuser, $id)
    {
        $data = Webuser::find($id);

        if (!empty($data)) {
            if ($data->status == "Block") {
                $data->status = "Unblock";
            } else if ($data->status == "Unblock") {
                $data->status = "Block";
            }

            $data->save();

            return redirect('/user_details')->with('success', 'User status updated successfully.');
        } else {
            return redirect('/user_details')->with('fail', 'Requested user is not available for status update.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webuser $webuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webuser $webuser, $deleteid)
    {
        $data = Webuser::find($deleteid);
        $old_image = $data->image;

        if (file_exists('website/upload/images/user/'.$old_image)) {
            unlink('website/upload/images/user/'.$old_image);
        }

        $data->delete();
        
        return redirect('/user_details')->with('success','User deleted successfully.');
    }
}
