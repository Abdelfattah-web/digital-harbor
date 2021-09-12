<?php

namespace App\Http\Controllers;
use App\User;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        
        return view('users.index', compact('users'));
    }

    public function getData()
    {
        $user = User::get();

        return view('welcome', compact('user'));
    }

    public function getAllalbums()
    {
        $albums = Album::withCount('photos')->get();

        $usersAlbum = Album::with('users')->get();

        return view('all-albums', compact('albums','usersAlbum')); 
    }

    public function getAllphotos($slug)
    {
        // $all_photos = Photo::with('albums')->get();
        // $all_photos = 

        // $album->load('photos');

        $albums_id    = Album::select('id')->where('slug' , '=' , $slug)->get();
        $photos       = Photo::where('albums_id' , '=' , $albums_id[0]->id)->get();

        return view('all-photos', compact('photos')); 
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required',  'max:12', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $users = User::create([
            'name'           => $request->name,
            'email'           => $request->email,
            'password' => Hash::make($request['password']),
            'phone'           => $request->phone,
            'address'         => $request->address,
            'city'            => $request->city,
            'street'          => $request->street

        ]);

       
        return redirect()->route('users.index')->with('flash_message', 'New User has been created Successfully.');
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
