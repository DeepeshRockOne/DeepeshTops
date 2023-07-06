<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add_category');
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
        $data = new categorie();
        $data->name = $request->name;
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . "_img." . $image->getClientOriginalExtension();
            $image->move('admin/upload/categories/', $image_name);
            $data->image = $image_name;
        }

        $data->save();

        return redirect('manage_category')->with('category_added_success', 'Category added successfully.');
    }

    public function manageCategory()
    {
        $data = categorie::all();
        return view('admin.manage_category', ['data'=>$data]);
    }

    public function editCategory(categorie $categorie, $editid)
    {
        $data = categorie::find($editid);
        return view('admin.edit_category', ['data'=>$data]);
    }

    public function updateCategory(Request $request, $editid)
    {
        $data = categorie::find($editid);
        $data->name = $request->name;
        
        if ($request->hasFile('image')) {
            $old_image = $data->image;

            $image = $request->image;
            $image_name = time() . "_img." . $image->getClientOriginalExtension();
            $image->move('admin/upload/categories/', $image_name);
            $data->image = $image_name;

            unlink('admin/upload/categories/'.$old_image);
        }
        $data->save();

        return redirect('manage_category')->with('category_update_success', 'Category updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie $categorie, $delid)
    {
        $data = categorie::find($delid);
        $old_category_image = $data->image;
        unlink('admin/upload/categories/'.$old_category_image);

        $data->delete();
        return redirect('manage_category')->with('category_deleted_success', 'Category deleted successfully.');
    }
}
