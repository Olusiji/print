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
                    {{ $vendor->id}}
                    {{ $vendor->name}}
                    {{ $vendor->photolab_name}}
                    {{ $vendor->email}}
                    {{ $vendor->phone_number}}
                    {{ $vendor->address}}
                    {{ $vendor->city}}
                    {{ $vendor->state}}

                    <a href="{{ route('vendor.profile.edit') }}" class="btn btn-info" role="button">Edit Profile</a>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
