@extends('layouts.front')
@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3" >
                <div class="card-header"><ion-icon name="people-outline" size="small"></ion-icon> Users </div>
                <div class="card-body">
                    <h5 class="card-title">Check Below Button (All Users)</h5>
                    <a class="btn btn-light " href="{{ url('/users') }}" role="button">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3" >
                <div class="card-header"><ion-icon name="images-outline" size="small"></ion-icon> Albums</div>
                <div class="card-body">
                    <h5 class="card-title">Check Below Button (All Albums)</h5>
                    <a class="btn btn-light " href="{{ url('/all-albums') }}" role="button">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection