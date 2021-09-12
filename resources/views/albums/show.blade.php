@extends('layouts.app')

@section('title', ' | Photos')

@section('content')
@extends('layouts.auth')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="heading-content">Photos</h2>
            <hr >
        </div>
    </div>
    <div class="row">
        @if(count($album->photos) > 0)
            @foreach ($album->photos as $albums)
                <div class="col-md-2">
                    <img src="{{ url($albums->image) }}" style="object-fit: cover;height: 100px;margin-top: 29px;" alt="{{ $albums->name }}" class="img-responsive" width="100%" >
                </div>
            @endforeach
            @else
            <div class="col-md-12">
                <p>No Photos at the moment.</p>
            </div>    
        @endif
    </div>
</div>

@endsection