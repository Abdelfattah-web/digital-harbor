@extends('layouts.app')

@section('title', ' | Albums')

@section('content')
@extends('layouts.auth')
        <div class="container mt-5">
            <h2>Create Albums </h2>
        <hr>
        @include('includes.flash_message')
            <form method="POST" action="{{ route('albums.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
             <!-- CSRF Field -->
             @csrf
                <div class="form-group">
                    <label for="exampleInputalbum1">Album name: </label>
                    <input type="text" name="name" class="form-control" id="exampleInputalbum1" aria-describedby="albumHelp" placeholder="Enter Album name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Uploade Album image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            <hr style="margin:40px 0px 10px 0px">
            <h2>Albums Gallery</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Album Name</th>
                    <th scope="col">Album BG </th>
                    <th scope="col">Album's photos </th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                  

                        @if(count($albums) > 0)
                              @foreach ($albums as $album)
                            <tr>
                                <!-- <th scope="row">{{$loop->index +1}}</th> -->
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ ucfirst($album->name)}}</td>
                                <td><img src="{{ url($album->image) }}" width="80" height="80" alt="{{$album->name}}"></td>
                                <!-- <td>{{$album->photos->count()}}</td> -->
                                <td>{{$album->photos_count}} <ion-icon name="image-outline"></ion-icon></td>
                                <td>
                                    <a href="{{ route('albums.edit', $album->slug ) }}" class="btn btn-success btn-sm"><ion-icon name="create-outline"></ion-icon> Edit </a>
                                    <form method="POST" action="{{ url('/albums' . '/' . $album->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Album" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i><ion-icon name="trash-outline"></ion-icon> Delete</button>
                                    </form>
                                    <a href="{{ url('/albums/' . $album->slug) }}" class="btn btn-info btn-sm text-white"><ion-icon name="eye-outline"></ion-icon> View Photos </a>

                                </td>
                            </tr>
                        
                       
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">No Albums at the moment.</td>
                            </tr>
                    @endif
                </tbody>
            </table>
            @endsection