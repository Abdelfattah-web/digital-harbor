@extends('layouts.app')

@section('title', ' | Albums')

@section('content')
@extends('layouts.auth')
        <div class="container mt-5">
        @include('includes.flash_message')
            <div class="card-body">
            <!-- route and enctype -->
                <form method="post" action="{{ route('albums.update', $albums->id) }}"  enctype="multipart/form-data">
                    <!-- CSRF Field -->
                    @csrf  
                    @method('PUT')
                    <div class="form-group">
                    <label >Update Album name:</label>
                            <input type="text" name="name" value="{{$albums->name}}"  class="form-control"  placeholder="Enter Album name">
                    </div>
                    <br>
                    <label >Current Album Image </label><br>
                    <img src="{{url($albums->image)}}" class="mb-3 " width="30%"  alt="{{$albums->name}}">
                    <br>
                    <div class="form-group">
                        <label >Uploade Album Image:</label>
                        <input type="file" name="image" class="form-control-file" >
                    </div>
                    
                    <button type="submit"  class="btn btn-primary">Update </button>
                </form>
            </div>
        </div>
        @endsection
