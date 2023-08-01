<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin_login');
    }

    public function adminLoginAuth(Request $request)
    {
        $request->validate([
            'admin_uname' => 'required',
            'admin_password' => 'required'
        ]);

        $admin_uname = $request->admin_uname;

        $data = admin::where('admin_uname', $admin_uname)->first();

        if ($data) {
            if (Hash::check($request->admin_password, $data->admin_password)) {
                session()->put('admin_id', $data->id);
                session()->put('admin_uname', $data->admin_uname);
                return redirect('/admin_dashboard')->with('success', 'Login successfully.');
            } else {
                return redirect('/admin_login')->with('fail', 'Password not valid.');
            }
        } else {
            return redirect('/admin_login')->with('fail', 'Username not valid.');
        }
    }

    public function adminLogout()
    {
        session()->pull('admin_id');
        session()->pull('admin_uname');

        return redirect('/admin_login')->with('success', 'Logout successfully.');
    }

    public function adminProfile(Admin $admin)
    {
        $data = array();
        if (session()->has('admin_id')) {
            $data = Admin::where('id', session()->get('admin_id'))->first();
        }

        if ($data) {
            return view('admin.admin_profile', compact('data'));
        } else {
            return redirect('/admin_dashboard')->with('fail', 'Your profile is not visible, record not found.');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admin.admin_dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
