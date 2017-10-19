@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vendor Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('vendor.profile.edit.submit') }}" method="post">
                        {{csrf_field() }}
                        
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $vendor->name}}">

                        <label>Photolab Name</label>
                        <input type="text" name="photolab_name" value="{{ $vendor->photolab_name}}">

                        <label>Email</label>
                        <input type="email" name="email" value="{{ $vendor->email}}">

                        <label>Phone Number</label>
                        <input type="text" name="phone_number" value="{{ $vendor->phone_number}}">

                        <label>Address</label>
                        <input type="text" name="address" value="{{ $vendor->address}}">

                        <label>City</label>
                        <input type="text" name="city" value="{{ $vendor->city}}">

                        <label>State</label>
                        <input type="text" name="state" value="{{ $vendor->state}}">

                        <button class="btn btn-default" type="submit">Submit</button>
                    </form>
               

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
