<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::get();
        $albums = auth()->user()->albums;
        
        return view('photos.create')->with('photos', $photos)->with('albums', $albums);
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
        if($request->hasfile('image'))
        {

           foreach($request->file('image') as $image)
           {
               $name = $image->getClientOriginalName();
               $image_new_name = 'image-' . time() . '-' . $name;
               $image->move('uploads/photos' , $image_new_name);  
               $data[] = $name;  

               $form    = Photo::create([
                   'name'           => $request->name,
                   'slug'           => str_slug($request->name),
                   'image'          => 'uploads/photos/' . $image_new_name,
                   'albums_id'      =>  $request->albums_id
                   ]);
                    
                   $form->save();

           }
        }

        return redirect()->route('photos.index')->with('flash_message', 'Photos  has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
