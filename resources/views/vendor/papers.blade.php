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

                    @foreach ($vendor_paper_types as $vendor_paper_type)
                        <div>
                            {{ $vendor_paper_type }}
                        </div>
                    @endforeach

               

                    
                </div>
            </div>






            <div class="panel panel-default">
                <div class="panel-heading">New paper type</div>

                <div class="panel-body">

                    <form action="{{ route('vendor.papers.add_new') }}" method="post">
                        {{csrf_field() }}

                        <select id="cover_types_select" name="cover_types">
                            @foreach (paper_types as paper_type)
                                <option value="{{ paper_type->id }}">{{ paper_type->name }}</option>
                            @endforeach
                        </select>

                        <button id="new_paper" type="button">Add new paper type</button>
                        <button class="btn btn-default" type="submit">Submit</button>
                    </form>
               
                </div>
            </div>







        </div>
    </div>
</div>
@endsection
