@extends('layouts.user_app')

@section('title', 'Profile')

@section('profile_nav_class', 'active')

@section('content')

<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Profile</h3>
        <p class="panel-subtitle"></p>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-9">
                <form action="{{ route('user.profile.edit.submit') }}" method="post">
                    {{csrf_field() }}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Studio Name</label>
                                <input type="text" class="form-control" name="studio_name" value="{{ $user->studio_name}}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name}}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $user->address}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" value="{{ $user->city}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State</label>
                                <input type="email" class="form-control" name="state" value="{{ $user->state}}">
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-default" type="submit">Update Profile</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
