@extends('layouts.app')
@section('content')
@extends('layouts.auth')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="heading-content">{{ ucfirst(Auth::user()->name) }}'s Albums</h2>
            <hr class="mb-5">
        </div>
    </div>
    <div class="row ">
        @if(count($albums) > 0)
            @foreach ($albums as $album)
            <div class="col-md-4" style="margin-bottom: 2rem;">
                <div class="card" >
                    <img class="card-img-top" src="{{ url($album->image) }}" alt="{{$album->name}}">
                    <div class="card-body">
                        <span class="card-style"><a href="{{ url('/albums/' . $album->slug) }}">{{ ucfirst($album->name) }}</a></span>
                        <h5 class="float-right "><a href="{{ url('/albums/' . $album->slug) }}"><span class="badge badge-primary"> {{ $album->photos_count }} <ion-icon name="images-outline"></ion-icon></span></a></h5>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p>No Albums at the moment.</p>
        @endif
    </div>
</div>
@endsection
