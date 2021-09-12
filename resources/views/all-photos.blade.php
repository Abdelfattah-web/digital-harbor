@extends('layouts.app')

@section('title', ' | Photos')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="heading-content">Photos</h2>
            <hr >
        </div>
    </div>
    <div class="row">
          @if(count($photos) > 0)
            @foreach ($photos as $photo)
                <div class="col-md-2">
                    <img src="{{ url($photo->image) }}" style="object-fit: cover;height: 100px;margin-top: 29px;" alt="{{ $photo->name }}" class="img-responsive" width="100%" >
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