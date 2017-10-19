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

                    <div>
                    @foreach ($paper_types as $paper_type)
                        <div>
                            <h3>{{ $paper_type }}</h3>
                            @foreach ($paper_prices as $paper_price)
                                @if ( $paper_price->paper_type == $paper_type )
                                <p>Size : {{ $paper_price->size }}</p>    
                                <p>Price : {{ $paper_price->price }}</p>   
                                @endif
                            @endforeach
                        </div>    
                        
                    @endforeach
                    </div>
               

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
