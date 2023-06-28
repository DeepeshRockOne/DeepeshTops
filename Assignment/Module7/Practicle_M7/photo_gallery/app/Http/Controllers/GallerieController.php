<?php

namespace App\Http\Controllers;

use App\Models\Gallerie;
use Illuminate\Http\Request;

class GallerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image-upload');
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = new Gallerie();
        $file = $request->file('file');
        $filename = time() . "_img." . $file->getClientOriginalExtension();
        $file->move('upload/gallery/', $filename);
        $data->img = $filename;
        $data->img_description = $request->image_description;

        $data->save();
        return redirect('/')->with('img_upload_success', 'Image uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallerie  $gallerie
     * @return \Illuminate\Http\Response
     */
    public function show(Gallerie $gallerie)
    {
        $images = Gallerie::all();
        return view('image-gallery', compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallerie  $gallerie
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallerie $gallerie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallerie  $gallerie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallerie $gallerie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallerie  $gallerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallerie $gallerie)
    {
        //
    }
}
