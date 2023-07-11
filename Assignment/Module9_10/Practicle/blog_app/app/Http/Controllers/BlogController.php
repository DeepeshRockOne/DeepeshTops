<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
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
            'title' => 'required|max:100',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = new Blog();
        $data->title = $request->title;
        $data->content = $request->content;
        
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $image_name = time()."_img.".$image->getClientOriginalExtension();
            $image->move('images/upload/', $image_name);
            $data->image = $image_name;
        }
        $data->save();

        return redirect('view_blogs')->with('blog_added_success', 'Blog added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $data = Blog::all();
        return view('view_blogs', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog, $id)
    {
        $data = Blog::find($id);

        if($data) {
            return view('edit_blog', compact('data'));
        } else {
            return redirect('view_blogs')->with('no_such_blog', 'No such blog found for edit.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        
        if ($request->hasfile('image')) {
            $old_image = "";
            if ($blog->image != "") {
                $old_image = $blog->image;
            }

            $image = $request->file('image');
            $image_name = time()."_img.".$image->getClientOriginalExtension();
            $image->move('images/upload/', $image_name);
            $blog->image = $image_name;

            if ($old_image != "" && file_exists('images/upload/'.$old_image)) {
                unlink('images/upload/'.$old_image);
            }
        }
        $blog->save();

        return redirect('view_blogs')->with('blog_update_success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, $id)
    {
        $data = Blog::find($id);

        if($data) {
            if ($data->image) {
                if (file_exists('images/upload/'.$data->image)) {
                    unlink('images/upload/'.$data->image);
                }
            }
            $data->delete();

            return redirect('view_blogs')->with('blog_deleted_success', 'Blog deleted successfully.');
        } else {
            return redirect('view_blogs')->with('no_such_blog', 'No such blog found for edit.');
        }
    }
}
