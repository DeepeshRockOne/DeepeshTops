<?php

namespace App\Http\Controllers;

use App\Models\webuser;
use Illuminate\Http\Request;
use App\Models\countrie;
use App\Mail\welcomemail;
use Hash;
use Session;
use Mail;

class webuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = countrie::all();
        return view('website.register', ['countries' => $countries]);
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

    public function login()
    {
        return view('website.login');
    }

    public function userLoginAuth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3|max:12'
        ]);

        $username = $request->username;
        $data = webuser::where('username', $username)->first();

        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                if ($data->status == "Block") {
                    return redirect()->back()->with('login_fail', 'Login failed due to block account.');
                } else {
                    session()->put('userid', $data->id);
                    session()->put('uname', $data->name);
                    session()->put('username', $data->username);
                    return redirect('/')->with('loging_success', 'Login successfully.');
                }
            } else {
                return redirect()->back()->with('login_fail', 'Password not valid.');
            }
        } else {
            return redirect()->back()->with('login_fail', 'Username not valid.');
        }
    }

    public function userLogout()
    {
        session()->pull('userid');
        session()->pull('uname');
        session()->pull('username');
        return redirect('/')->with('logout_success', 'Logout successfully.');
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
            'username' => 'required|unique:webusers|max:100',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:3|max:12',
            'confirm_password' => 'required|same:password',
            'gender' => 'required|in:male,female',
            'language' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required'
        ]);

        if ($request->password == $request->confirm_password) {
            $data = new webuser();
            $data->name = $request->name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->gender = $request->gender;

            $file = $request->file('file');
            $filename = time() . '_img.' . $file->getClientOriginalExtension();
            $file->move('website/upload/webuser/', $filename);
            $data->file = $filename;

            $data->language = implode(",", $request->language);
            $data->cid = $request->country;
            $data->save();

            /* $name = $request->name;
            $email = $request->email;
            $emailData = array('name'=>$name, 'email'=>$email);

            Mail::to($email)->send(new welcomemail($emailData)); */

            return redirect('login')->with('register_success', 'Registration success, please login.');
        } else {
            return redirect('register')->with('error_msg', 'Password and Confirm Password should be same.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function show(webuser $webuser)
    {
        //$data = webuser::all();
        $data = webuser::join('countries', 'webusers.cid', '=', 'countries.id')->get(['webusers.*', 'countries.name as country_name']);
        //return view('admin.manage_webuser', ['data'=>$data]);
        return view('admin.manage_webuser', compact('data'));
    }

    public function userProfile()
    {
        $userId = session()->get('userid');
        $data = webuser::where('id', $userId)->first();
        return view('website.user_profile', ['data'=>$data]);        
    }

    public function editUserProfile(webuser $webuser, $editid)
    {
        $countries = countrie::all();
        $data = webuser::find($editid);
        if (!empty($data)) {
            return view('website.edit_user_profile', ['countries'=>$countries, 'data'=>$data]);
        } else {
            return redirect('/')->with('user_profile_not_available', 'Requested user profile not available.');
        }
    }

    public function updateUserProfile(Request $request, $id)
    {
        $data = webuser::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->language = implode(",", $request->language);

        if ($request->hasFile('file')) {
            $old_image = $data->file;

            $file = $request->file('file');
            $filename = time() . "_img." . $file->getClientOriginalExtension();
            $file->move('website/upload/webuser/', $filename);
            $data->file = $filename;

            unlink('website/upload/webuser/'.$old_image);
        }
        
        $data->cid = $request->country;
        session()->put('uname', $data->name);
        $data->save();

        return redirect('user_profile')->with('user_profile_update_success', 'Your profile updated successfully.');
    }

    public function updateStatusWebuser($statusid)
    {
        $data = webuser::find($statusid);
        if ($data->status == "Block") {
            $data->status = 'Unblock';
            $data->save();

            return redirect('manage_webuser')->with('user_status_unblock', 'User unblocked successfully.');
        } else if ($data->status == "Unblock") {
            $data->status = 'Block';
            $data->save();

            session()->pull('userid');
            session()->pull('uname');
            session()->pull('username');

            return redirect('manage_webuser')->with('user_status_block', 'User blocked successfully.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function edit(webuser $webuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, webuser $webuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(webuser $webuser, $id)
    {
        // $data = webuser::find($id);
        // $oldfile = $data->file;
        // $data->delete();
        // unlink('website/upload/webuser/'.$oldfile);
        // return redirect('manage_webuser')->with('user_delete','User deleted successfully.');
    }
}
