<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Songcategorie;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songCategories = Songcategorie::all();

        return view('admin.add_song', compact('songCategories'));
    }

    public function viewSong(Request $request, $song_cat_id=null)
    {
        $search = $request->search ?? "";

        if ($song_cat_id != '') {
            $data = Song::join('songcategories', 'songs.scat_id', '=', 'songcategories.id')
                    ->where('songcategories.id', '=', $song_cat_id)
                    ->paginate(5, ['songs.*', 'songcategories.category_name as song_category_name']);

            /* if ($data->count() <= 0) {
                $data = Song::join('songcategories', 'songs.scat_id', '=', 'songcategories.id')
                    ->paginate(5, ['songs.*', 'songcategories.category_name as song_category_name']);
            } */
        } else if ($search != '') {
            $data = Song::join('songcategories', 'songs.scat_id', '=', 'songcategories.id')
                    ->where('songcategories.category_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('songs.name', 'LIKE', '%'.$search.'%')
                    ->paginate(5, ['songs.*', 'songcategories.category_name as song_category_name']);

            if ($data->count() <= 0) {
                $data = Song::join('songcategories', 'songs.scat_id', '=', 'songcategories.id')
                    ->paginate(5, ['songs.*', 'songcategories.category_name as song_category_name']);
            }
        } else {
            $data = Song::join('songcategories', 'songs.scat_id', '=', 'songcategories.id')
                    ->paginate(5, ['songs.*', 'songcategories.category_name as song_category_name']);
        }

        return view('website.song', compact('data', 'search'));
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
            'image' => 'required|image',
            'song' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'song_category' => 'required'
        ]);

        $data = new Song();
        $data->name = $request->name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '_img.' . $image->getClientOriginalExtension();
            $image->move('admin/upload/song_images/', $image_name);
            $data->image = $image_name;
        }

        if ($request->hasFile('song')) {
            $song = $request->file('song');
            $song_name = time() . '_song.' . $song->getClientOriginalExtension();
            $song->move('admin/upload/songs/', $song_name);
            $data->song = $song_name;
        }

        $data->scat_id = $request->song_category;

        $data->save();

        return redirect('/manage_song')->with('success', 'Song added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        $data = Song::join('songcategories', 'songs.scat_id', '=', 'songcategories.id')
                ->paginate(5,['songs.*', 'songcategories.category_name as song_category_name']);

        return view('admin.manage_song', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song, $editid)
    {
        $data = Song::find($editid);
        $songCategories = Songcategorie::all();

        if (!empty($data)) {
            return view('admin.edit_song', compact('data', 'songCategories'));
        } else {
            return redirect('/manage_song')->with('fail', 'Requested song is not available for edit.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song, $editid)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|max:2048',
            'song' => 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'song_category' => 'required'
        ]);

        $data = Song::find($editid);

        if ($data) {
            $data->name = $request->name;

            if ($request->hasFile('image')) {
                $old_image = $data->image;
    
                $image = $request->file('image');
                $image_name = time() . '_img.' . $image->getClientOriginalExtension();
                $image->move('admin/upload/song_images/', $image_name);
                $data->image = $image_name;
    
                if (file_exists('admin/upload/song_images/'.$old_image)) {
                    unlink('admin/upload/song_images/'.$old_image);
                }
            }

            if ($request->hasFile('song')) {
                $old_song = $data->song;

                $song = $request->file('song');
                $song_name = time() . '_song.' . $song->getClientOriginalExtension();
                $song->move('admin/upload/songs/', $song_name);
                $data->song = $song_name;

                if (file_exists('admin/upload/songs/'.$old_song)) {
                    unlink('admin/upload/songs/'.$old_song);
                }
            }

            $data->scat_id = $request->song_category;
   
            $data->save();
    
            return redirect('/manage_song')->with('success', 'Song updated successfully.');
        } else {
            return redirect('/manage_song')->with('fail', 'Requested song is not available for update.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song, $deleteid)
    {
        $data = Song::find($deleteid);

        if (!empty($data)) {
            $old_song_image = $data->image;
            $old_song = $data->song;
            $data->delete();

            if (file_exists('admin/upload/song_images/'.$old_song_image)) {
                unlink('admin/upload/song_images/'.$old_song_image);
            }

            if (file_exists('admin/upload/songs/'.$old_song)) {
                unlink('admin/upload/songs/'.$old_song);
            }

            return redirect('/manage_song')->with('success','Song deleted successfully.');
        } else {
            return redirect('/manage_song')->with('fail', 'Requested song is not available for delete.');
        }
    }
}
