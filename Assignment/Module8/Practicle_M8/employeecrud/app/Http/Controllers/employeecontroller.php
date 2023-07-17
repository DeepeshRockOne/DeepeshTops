<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use session;

class employeecontroller extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move('upload/employee/', $filename);
        }

        DB::table('employees')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'unm' => $request->unm,
            'pass' => Hash::make($request->pass),
            'gen' => $request->gen,
            'file' => $filename,
        ]);
    
        return redirect('/index')->with('sucess','regsiter sucess');
    } 

    public function show()
    {
        $data=DB::table('employees')->get();
        return view('display', ['data'=>$data]);
    }

    public function destory($id)
    {   
        $data=DB::table('employees')->where('id', $id)->delete();
        return redirect('/display');
    }

    public function edit($id)
    {
        $data=DB::table('employees')->find($id);
        return view('/editprofile', ["data"=>$data]);
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('file')){
            $old_img=$request->file;
            // unlink('upload/employee/'.$old_img);
            $file=$request->file('file');
            $filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
            $file->move('upload/employee/',$filename);
            
            $data=DB::table('employees')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'unm' => $request->unm,
                'gen' => $request->gen,
                'file' => $filename,
            ]);
        }

        return redirect('/display')->with('sucess','update sucess');
    }
}
