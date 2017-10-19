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

                    @if (count($job_items) == 0)
                        <p>You have not gotten any job yet</p>

                    @else
                        <table border="1" class="table">
                            <tbody>
                                <tr>
                                    <td>Job Type</td>
                                    <td>Cover Style</td>
                                    <td>Size</td>
                                    <td>Paper Type</td>
                                    <td>Number of sheets</td>
                                    <td>Lamination</td>
                                    <td>Packaging</td>
                                </tr>  
                                @foreach ($job_items as $job_item)   
                                    <tr>
                                        <td>{{ $job_item->name }}</td>
                                        <td>{{ $job_item->cover_type }}</td>
                                        <td>{{ $job_item->size }}</td>
                                        <td>{{ $job_item->paper_type }}</td>
                                        <td>{{ $job_item->no_of_sheets }}</td>
                                        <td>{{ $job_item->lamination }}</td>
                                        <td>{{ $job_item->packaging_type }}</td>  
                                    </tr>                
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
