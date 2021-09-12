@extends('layouts.app')

@section('title', ' | My Profile')

@section('content')
@extends('layouts.auth')
    <div class="container">
        <div class="row profile-info mt-5">
            <div class="col-md-3 text-center">
            @if(isset($user->image))
                <img src="{{$user->image}}" class="img-thumbnail" alt="{{$user->name}}" width="200">
            @else
                <img src="{{ asset('uploads/profile/user.png')}}" alt="profile image" width="200">
            @endif
                <a class="btn btn-primary btn-lg btn-block mt-3" href="{{ route('profile.edit', $user->id ) }}" role="button">Update Profile</a>
            </div>
            <div class="col-md-9">
                <ul class="list-group">
                    <li class="list-group-item"><span>User Name:</span> {{ ucfirst($user->name) }}</li>
                    <li class="list-group-item"><span>Email:</span> {{ $user->email }}</li>
                    <li class="list-group-item"><span>Phone:</span> {{ $user->phone }}</li>
                    <li class="list-group-item"><span>Address:</span> {{ ucfirst($user->address) }}</li>
                    <li class="list-group-item"><span>City:</span> {{ ucfirst($user->city) }}</li>
                    <li class="list-group-item"><span>Street:</span> {{ ucfirst($user->street) }}</li>
                </ul>
                <br>
                @include('includes.flash_message')
            </div>
        </div>
    </div>

@endsection