@extends('layouts.app')

@section('title', ' | Photos')

@section('content')
@extends('layouts.auth')
        <br>
        <div class="container">
        <hr>
            <h2>Insert Photos </h2>
        <hr>
        @include('includes.flash_message')
            <form method="POST" action="{{ route('photos.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
             <!-- CSRF Field -->
             @csrf
                <div class="form-group">
                    <label for="exampleInputPhoto1">Photo name: </label>
                    <input type="text" name="name" class="form-control" id="exampleInputPhoto1" aria-describedby="PhotoHelp" placeholder="Enter Photo name">
                </div>
                <div class="form-group">
                    <label >Select Album:</label>
                    <!-- store category id -->
                    <select name="albums_id" class="form-control">
                        @foreach ($albums as $album)
                            <option value="{{$album->id}}"
                            {{ $album->albums_id == $album->id ? 'selected' : ''}}
                            >
                            {{$album->name}}
                            </option>
                        @endforeach
                    </select>
                </div> 
                <div class="form-group">
                    <label for="exampleFormControlFile1">Uploade Photos </label>
                    <input type="file" name="image[]" class="form-control-file" id="exampleFormControlFile1" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
            @endsection
