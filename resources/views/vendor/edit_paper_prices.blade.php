@extends('layouts.vendor_app')

@section('title', 'Paper Prices')

@section('pricing_nav_class', 'active')

@section('content')

<form action="{{ route('vendor.papers.prices.edit.submit') }}" method="post">
    {{csrf_field() }}
    @foreach ($paper_types as $paper_type)
    <!-- PANEL HEADLINE -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $paper_type }}</h3>
        </div>
        <div class="panel-body">
            @foreach ($paper_prices as $paper_price)
                @if ( $paper_price->paper_type == $paper_type )
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{ $paper_price->size }}</label>
                            <input type="text" class="form-control" name="{{ $paper_price->id }}" value="{{ $paper_price->price }}">
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