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

                    <form action="{{ route('submit_paper_prices_form') }}" method="post">
                        {{csrf_field() }}
                    @foreach ($paper_types as $paper_type)
                        <fieldset>
                            <legend>{{ $paper_type }}</legend>

                            @foreach ($paper_prices as $paper_price)
                                @if ( $paper_price->paper_type == $paper_type )
                                    <label>{{ $paper_price->size }}</label>
                                    <input type="text" name="{{ $paper_price->id }}" value="{{ $paper_type->price }}">
                                @endif
                            @endforeach
                            
                        </fieldset>
                    @endforeach
                        <button class="btn btn-default" type="submit">Submit</button>
                    </form>
               

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
