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

                    <form action="{{ route('vendor.covers.prices.edit.submit') }}" method="post">
                        {{csrf_field() }}
                    @foreach ($cover_types as $cover_type)
                        <fieldset>
                            <legend>{{ $cover_type }}</legend>

                            @foreach ($covers as $cover)
                                @if ( $cover->cover_type == $cover_type )
                                    <label>{{ $cover->size }}</label>
                                    <input type="text" name="{{ $cover->id }}" value="{{ $cover->price }}">
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
