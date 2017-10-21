@extends('layouts.vendor_app')

@section('content')


<div class="row">
    <div class="col-md-12">
        <!-- TABLE STRIPED -->
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Jobs Items</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Job Type</td>
                            <td>Cover Style</td>
                            <td>Size</td>
                            <td>Paper Type</td>
                            <td>Number of sheets</td>
                            <td>Lamination</td>
                            <td>Packaging</td>
                            <td fa fa-file-archive-o" aria-hidden="true">Files</td>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach ($job_items as $job_item)   
                                <tr>
                                    <td>{{ $job_item->name }}</td>
                                    <td>{{ $job_item->cover_type }}</td>
                                    <td>{{ $job_item->size }}</td>
                                    <td>{{ $job_item->paper_type }}</td>
                                    <td>{{ $job_item->no_of_sheets }}</td>
                                    <td>{{ $job_item->lamination }}</td>
                                    <td>{{ $job_item->packaging_type }}</td>
                                    <td><a href=""><i class="fa fa-file-archive-o" aria-hidden="true"></i>  Download files</a></td>
                                </tr>                
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END TABLE STRIPED -->
    </div>
</div>

@endsection