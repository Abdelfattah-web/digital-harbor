@extends('layouts.front')
@section('content')

<div class="container ">
    <div class="row ">
        @if(count($albums) > 0)
            @foreach ($albums as $album)
            <div class="col-md-4 mt-5" >
                <div class="card style-img-album" >
                    <img class="card-img-top " src="{{ url($album->image) }}" alt="{{$album->name}}">
                    <div class="card-body">
                        <span class="card-style"><a href="{{ url('/all-photos/' . $album->slug) }}">{{ ucfirst($album->name) }}</a></span>
                        <h5 class="float-right "><a href="{{ url('/all-photos/' . $album->slug) }}"><span class="badge badge-primary"> {{ $album->photos_count }} <ion-icon name="images-outline"></ion-icon></span></a></h5>
                           
                        <span></span>
                        
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