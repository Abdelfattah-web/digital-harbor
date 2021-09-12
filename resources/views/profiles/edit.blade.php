@extends('layouts.app')

@section('title', ' | My Profile')

@section('content')
@extends('layouts.auth')
    <div class="container">
        <div class="row profile-info mt-5">
            <div class="col-md-3 text-center">
                @if(\Auth::user()->image != null)
                    <img src="{{ url($profile->image) }}" class="img-thumbnail" alt="{{$profile->name}}" width="200">
                @else
                    <img src="{{ asset('uploads/profile/user.png')}}" alt="profile image" width="200">
                @endif
            </div>
            <div class="col-md-9">
                
                <form method="post" action="{{ route('profile.update', $profile->id) }}"  enctype="multipart/form-data">
                    <!-- CSRF Field -->
                    @csrf  
                    @method('PUT')

                    <div class="form-group">
                    <label>  Update Profile Name :</label>
                            <input type="text" name="name" value="{{ $profile->name }}"  class="form-control"  placeholder="Update Profile Name">
                    </div>
                    <div class="form-group">
                    <label>  Update Profile Email :</label>
                            <input type="text" name="email" value="{{ $profile->email }}"  class="form-control"  placeholder="Update Profile Email">
                    </div>
                    <div class="form-group">
                    <label>  Update Profile Phone :</label>
                            <input type="text" name="phone" value="{{ $profile->phone }}"  class="form-control"  placeholder="Update Profile phone">
                    </div>
                    <div class="form-group">
                    <label>  Update Profile Address :</label>
                            <input type="text" name="address" value="{{ $profile->address }}"  class="form-control"  placeholder="Update Profile address">
                    </div>
                    <div class="form-group">
                    <label>  Update Profile City :</label>
                            <input type="text" name="city" value="{{ $profile->city }}"  class="form-control"  placeholder="Update Profile City">
                    </div>
                    <div class="form-group">
                    <label>  Update Profile Street :</label>
                            <input type="text" name="street" value="{{ $profile->street }}"  class="form-control"  placeholder="Update Profile Street">
                    </div>

                    <div class="form-group">
                        <label >Uploade Profile Image:</label>
                        <input type="file" name="image" class="form-control-file" >
                    </div>

                    
                    <button type="submit"  class="btn btn-primary btn-lg btn-block">Update Profile </button>
                </form>
            </div>
        </div>
    </div>
@endsection