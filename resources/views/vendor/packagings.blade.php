@extends('layouts.vendor_app')

@section('title', 'Packaging')

@section('pricing_nav_class', 'active')

@section('content')

<!-- PANEL HEADLINE -->
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Packaging Types</h3>
        <p class="panel-subtitle"></p>
    </div>
    <div class="panel-body">
        <div class="row">
            @foreach ($packaging_types as $packaging_type)
                <div class="col-md-3 packaging_type">
                    <div class="metric" >
                        <span class="number">{{ $packaging_type }}</span><p><button type="button" value ="{{ $packaging_type }}" class="glyphicon glyphicon-remove delete_packaging"></button></p>
                    </div>
                </div>
            @endforeach
        </div>
        <a type="button" class="btn btn-primary btn-lg" href="{{ route('vendor.packagings.prices.edit') }}">Edit packaging prices</a>    
    </div>
</div>


<<div class="panel">
    <div class="panel-heading">New Packaging</div>
    <div class="panel-body">
        <div>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        
            <form action="{{ route('vendor.packagings.add_new') }}" method="post" id="new_packaging_type">
            {{csrf_field() }}
                <!-- setting the type to button make it not submit the form // by default when clicked it will submit the form to the url in action -->
                <button id="new_packaging" type="button" >Add new package</button>
                <input id="packagesSubmit" type="submit" name="Done">
            </form>
        </div>

    </div>
</div>           

@endsection
