@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cover Types</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($cover_types as $cover_type)
                        <div>
                            {{ $cover_type }}
                        </div>
                    @endforeach

                    
                    


                    
                        
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">New cover</div>
                <div class="panel-body">


                    <div>
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                    
                        <form action="#" method="post" id="new_cover_type" onsubmit="return false;">
                        {{csrf_field() }}
                            <!-- setting the type to button make it not submit the form // by default when clicked it will submit the form to the url in action -->
                            <button id="new_cover" type="button">Add new cover</button>
                            <input id="coversSubmit" type="submit" name="Done">
                        </form>
                    </div>


                </div>
            </div>




        </div>
    </div>
</div>
@endsection
