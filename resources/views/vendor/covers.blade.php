@extends('layouts.vendor_app')

@section('pricing_nav_class', 'active')

@section('title', 'Covers')

@section('content')



<!-- PANEL HEADLINE -->
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Cover Types</h3>
        <p class="panel-subtitle"></p>
    </div>
    <div class="panel-body">
        <div class="row">
            @foreach ($cover_types as $cover_type)
                <div class="col-md-3 cover_type">
                    <div class="metric" >
                        <span class="number">{{ $cover_type }}</span><p><button type="button" value ="{{ $cover_type }}" class="glyphicon glyphicon-remove delete_cover"></button></p>
                    </div>
                </div>
            @endforeach
        </div>
        <a type="button" class="btn btn-primary btn-lg" href="{{ route('vendor.covers.prices.edit') }}">Edit Cover prices</a>    
    </div>
</div>




<div class="panel">
    <div class="panel-heading">New cover</div>
    <div class="panel-body">
        <div>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        
            <form action="{{ route('vendor.new.covers') }}" method="post" id="new_cover_type">
            {{csrf_field() }}
                <!-- setting the type to button make it not submit the form // by default when clicked it will submit the form to the url in action -->
                <button id="new_cover" type="button" >Add new cover</button>
                <input id="coversSubmit" type="submit" name="Done">
            </form>
        </div>

    </div>
</div>
@endsection
