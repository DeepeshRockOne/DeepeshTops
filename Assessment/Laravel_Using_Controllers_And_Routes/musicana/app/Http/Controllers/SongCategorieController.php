<?php

namespace App\Http\Controllers;

use App\Models\Songcategorie;
use Illuminate\Http\Request;

class SongCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add_songCategory');
    }

    public function viewSongCategory()
    {
        $data = Songcategorie::all();

        return view('website.song_category', compact('data'));
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
            'category_name' => 'required|unique:songcategories',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $data = new Songcategorie();
        $data->category_name = $request->category_name;

        if ($request->hasFile('category_image')) {
            $category_image = $request->file('category_image');
            $category_image_name = time() . '_img.' . $category_image->getClientOriginalExtension();
            $category_image->move('admin/upload/song_category_images/', $category_image_name);
            $data->category_image = $category_image_name;
        }

        $data->save();

        return redirect('/manage_songCategory')->with('success', 'Song Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Songcategorie  $songCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(Songcategorie $Songcategorie)
    {
        $data = Songcategorie::all();

        return view('admin.manage_songCategory', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Songcategorie  $Songcategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Songcategorie $Songcategorie, $editid)
    {
        $data = Songcategorie::find($editid);

        if (!empty($data)) {
            return view('admin.edit_songCategory', compact('data'));
        } else {
            return redirect('/manage_songCategory')->with('fail', 'Requested song category is not available for edit.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Songcategorie  $Songcategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Songcategorie $Songcategorie, $editid)
    {
        $request->validate([
            'category_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $data = Songcategorie::find($editid);

        if ($data) {
            if ($request->hasFile('category_image')) {
                $old_category_image = $data->category_image;
    
                $category_image = $request->file('category_image');
                $category_image_name = time() . '_img.' . $category_image->getClientOriginalExtension();
                $category_image->move('admin/upload/song_category_images/', $category_image_name);
                $data->category_image = $category_image_name;
    
                if (file_exists('admin/upload/song_category_images/'.$old_category_image)) {
                    unlink('admin/upload/song_category_images/'.$old_category_image);
                }
            }
    
            $data->save();
    
            return redirect('/manage_songCategory')->with('success', 'Song Category updated successfully.');
        } else {
            return redirect('/manage_songCategory')->with('fail', 'Requested song category is not available for update.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SongCategorie  $songCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Songcategorie $Songcategorie, $deleteid)
    {
        $data = Songcategorie::find($deleteid);

        if (!empty($data)) {
            $old_category_image = $data->category_image;
            $data->delete();

            if (file_exists('admin/upload/song_category_images/'.$old_category_image)) {
                unlink('admin/upload/song_category_images/'.$old_category_image);
            }

            return redirect('/manage_songCategory')->with('success','Song Category deleted successfully.');
        } else {
            return redirect('/manage_songCategory')->with('fail', 'Requested song category is not available for delete.');
        }
    }
}
