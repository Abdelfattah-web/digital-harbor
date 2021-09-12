<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $albums = Album::get();
      // $albums = Album::where('created_by_id',auth()->id())->get();
      //    $albums = auth()->user()->load('albums');
      //    dd($albums);

        $albums = auth()->user()->albums()->withCount('photos')->get();
       // dd($albums);
        return view('albums.create')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $albums = $request->image;
    
        $originalName = $albums->getClientOriginalName();   
        $image_new_name = 'image-' . time() . '-' . $originalName;
        $albums->move('uploads/albums', $image_new_name);
        
        $albums = Album::create([
        'name'           => $request->name,
        'image'          => 'uploads/albums/' . $image_new_name,
        'slug'           => str_slug($request->name),
        'created_by_id'  => Auth::user()->id
        ]);

        return redirect()->route('albums.index')->with('flash_message', 'Album has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $album->load('photos');
      // dd($album);
      
      //  $photos = Album::with('photos')->where('slug',$id)->first();
        

        return view('albums.show')->with('album', $album);
    }

    // public function show(Album $album)
    // {
    //   //  dd($id);
    //     $photos = $album->load('photos');
        
    //     dd($photos);

    //     return view('albums.show')->with('photos', $photos);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
     //  dd($album);
      //  $albums = Album::find($id);

        return view('albums.edit')->with('albums', $album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $albums = Album::find($id);

        $albums           = Album::WHERE('id',$id)->first();

        $albums->name     = $request->input('name');

        if($request->hasFile('image')) {
            $featured = $request->image;
            $originalName = $featured->getClientOriginalName();   
            $featured_new_name = 'image-' . time() . '-' . $originalName;
            // move images inside upload directory - move method
            $featured->move('uploads/albums', $featured_new_name);
            //now update new name
            $albums->image = 'uploads/albums/' . $featured_new_name;

        }

        $albums->save();

        return redirect()->route('albums.index')->with('flash_message', 'Album has been Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albums = Album::find($id);

        $albumsDelete = Album::withTrashed()->where('id', $id)->first();

        $albumsDelete->forceDelete();

        return redirect('albums')->with('flash_message', 'Album deleted!');
    }
}
