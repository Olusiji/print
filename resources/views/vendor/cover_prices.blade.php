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
                    @foreach ($cover_types as $cover_type)
                        <div>
                            <h3>{{ $cover_type }}</h3>
                            @foreach ($covers as $cover)
                                @if ( $cover->cover_type == $cover_type )
                                <p>Size : {{ $cover->size }}</p>    
                                <p>Price : {{ $cover->price }}</p>   
                                @endif
                            @endforeach
                        </div>    
                        
                    @endforeach
                    </div>
                    <br>
                    <a href="{{ route('vendor.covers.prices.edit') }}">Edit prices for covers</a>
               

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
