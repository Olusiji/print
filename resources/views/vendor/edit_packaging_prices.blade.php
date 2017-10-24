@extends('layouts.vendor_app')

@section('title', 'Packaging Prices')

@section('pricing_nav_class', 'active')

@section('content')

<form action="{{ route('vendor.packagings.prices.edit.submit') }}" method="post">
    {{csrf_field() }}
    @foreach ($packagings as $packaging)
        <!-- PANEL HEADLINE -->
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $packaging->type }}</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="{{ $packaging->id }}" value="{{ $packaging->price }}">
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF PANEL HEADLINE -->
    @endforeach
    <button class="btn btn-default" type="submit">Submit</button>
</form>

@endsection
