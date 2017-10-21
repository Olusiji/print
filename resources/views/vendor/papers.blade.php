@extends('layouts.vendor_app')

@section('content')

<!-- PANEL HEADLINE -->
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Paper Types</h3>
        <p class="panel-subtitle"></p>
    </div>
    <div class="panel-body">
        <div class="row">
            @foreach ($vendor_paper_types as $vendor_paper_type)
                <div class="col-md-3" ">
                    <div class="metric" >
                        <span class="number">{{ $vendor_paper_type }}</span><p></p>
                    </div>
                </div>
            @endforeach
        </div>
        <a type="button" class="btn btn-primary btn-lg" href="{{ route('vendor.covers.prices.edit') }}">Edit Cover prices</a>    
    </div>
</div>


<div class="panel">
    <div class="panel-heading">New Paper type</div>
    <div class="panel-body">
        <div>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        
            <form action="{{ route('vendor.papers.add_new') }}" method="post">
            {{csrf_field() }}
                <!-- setting the type to button make it not submit the form // by default when clicked it will submit the form to the url in action -->
                <select id="cover_types_select" name="paper_types[]">
                    @foreach ($paper_types as $paper_type)
                        <option value="{{ $paper_type->id }}">{{ $paper_type->name }}</option>
                    @endforeach
                </select>
                <button id="new_paper" type="button" >Add new cover</button>
                <input  type="submit" name="Done">
            </form>
        </div>

    </div>
</div>           

@endsection
