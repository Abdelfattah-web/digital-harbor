@extends('layouts.front')
@section('content')
<div class="user-page-info">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Users</h4>
            </div>
            <div class="col-md-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-light text-primary btn-sm pr-4 pl-4 float-right" data-toggle="modal" data-target="#exampleModal">
                    <ion-icon name="add-circle-outline"></ion-icon> Add User
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content text-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="container">
                                <h5 class="text-success text-center "> User Information</h5>
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                    
                                        <form method="post" action="{{ route('users.store') }}" >
                                            <!-- CSRF Field -->
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Name </label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus placeholder="Enter name">
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email Address</label>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" placeholder="Enter email">
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Phone</label>
                                                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"  required autocomplete="phone" placeholder="Enter phone">
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Address</label>
                                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"  required autocomplete="address" placeholder="Enter address">
                                                        @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">City</label>
                                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"  required autocomplete="city" placeholder="Enter city">
                                                        @error('city')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Street</label>
                                                        <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street"  required autocomplete="street" placeholder="Enter city">
                                                        @error('street')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Password</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Enter new password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Confirm Password</label>
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="Confirm password">
                                                        @error('password_confirmation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
    <div class="col-md-12">
        <table class="table table-hover table-light  shadow p-3 mb-5 bg-white rounded table-user-style">
            <thead class="shadow-sm p-3">
                <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Number</th>
                <th scope="col">Address</th>
                </tr>
            </thead>
                <tbody>
                @if($users->count() > 0)
                        @foreach ($users as $user)
                        <tr>
                            <td scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="{{$user->id}}">
                                </div>
                            </td>
                            <td>{{ ucfirst($user->name    == null ? 'Waiting' : $user->name)  }}</td>
                            <td>{{         $user->email   == null ? 'Waiting' : $user->email }}</td>
                            <td>{{         $user->phone   == null ? 'Waiting' : $user->phone }}</td>
                            <td>{{ ucfirst($user->address == null ? 'Waiting' : $user->address) }}</td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">No Users at the moment.</td>
                    </tr>
                @endif
                        
                </tbody>
        </table>
        @include('includes.flash_message')

    </div>
</div>

@endsection