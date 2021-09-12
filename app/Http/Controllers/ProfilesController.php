<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('profiles.index', compact('user'));
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
        $profile = User::find($id);

        return view('profiles.edit', compact('profile'));
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
        $profile = User::find($id);

        $profile                    = User::WHERE('id',$id)->first();
        $profile->name              = $request->input('name');
        $profile->email             = $request->input('email');
        $profile->phone             = $request->input('phone');
        $profile->address           = $request->input('address');
        $profile->city              = $request->input('city');
        $profile->street            = $request->input('street');

        if($request->hasFile('image')) {
            $featured = $request->image;
            $originalName = $featured->getClientOriginalName();   
            $featured_new_name = 'image-' . time() . '-' . $originalName;
            // move images inside upload directory - move method
            $featured->move('uploads/profile', $featured_new_name);
            //now update new name
            $profile->image = 'uploads/profile/' . $featured_new_name;

        }

        $profile->save();

        return redirect()->route('profile.index')->with('flash_message', 'Profile has been Updated.');
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
