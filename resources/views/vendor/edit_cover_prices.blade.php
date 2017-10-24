@extends('layouts.vendor_app')

@section('title', 'Cover Prices')

@section('pricing_nav_class', 'active')

@section('content')

<form action="{{ route('vendor.covers.prices.edit.submit') }}" method="post">
    {{csrf_field() }}
    @foreach ($cover_types as $cover_type)
    <!-- PANEL HEADLINE -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $cover_type }}</h3>
        </div>
        <div class="panel-body">
            @foreach ($covers as $cover)
                @if ( $cover->cover_type == $cover_type )
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{ $cover->size }}</label>
                            <input type="text" class="form-control" name="{{ $cover->id }}" value="{{ $cover->price }}">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- END OF PANEL HEADLINE -->
@endforeach
    <button class="btn btn-default" type="submit">Submit</button>
</form>

@endsection
