<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class adminController extends Controller
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
        $admin_name = $request->admin_name;
        $data = admin::where('admin_name', $admin_name)->first();

        if ($data) {
            if (Hash::check($request->admin_password, $data->admin_password)) {
                session()->put('admin_id', $data->id);
                session()->put('admin_name', $data->admin_name);
                return redirect('admin_dashboard')->with('admin_loging_success', 'Login successfully.');
            } else {
                return redirect()->back()->with('admin_login_fail', 'Password not valid.');
            }
        } else {
            return redirect()->back()->with('admin_login_fail', 'Username not valid.');
        }
    }

    public function adminDashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function adminLogout()
    {
        session()->pull('admin_id');
        session()->pull('admin_name');

        return redirect('admin_login')->with('logout_success', 'Logout successfully.');
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
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
