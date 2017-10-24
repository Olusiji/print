@extends('layouts.user_app')

@section('title', 'Jobs')

@section('jobs_nav_class', 'active')

@section('content')




<div class="row">
    <div class="col-md-12">
        <!-- TABLE STRIPED -->
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Jobs</h3>
            </div>
            <div class="panel-body">
                @if (count($jobs) == 0)
                    <p>You don't have any Job</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Job Name</td>
                                <td>Address</td>
                                <td>Job Cost</td>
                                <td>Shipping Cost</td>
                                <td>Order Date</td>
                                <td>Job Details</td>
                            </tr>  
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)   
                                <tr>
                                    <td>{{ $job->job_name }}</td>
                                    <td>{{ $job->delivery_address }}</td>
                                    <td>{{ $job->cost }}</td>
                                    <td>{{ $job->shipping_cost }}</td>
                                    <td>{{ $job->created_at }}</td>
                                    <td><a href="{{ route("user.job_items", ['id' => $job->id]) }}">View job details</a></td>
                                </tr>                
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        <!-- END TABLE STRIPED -->
    </div>
</div>

@endsection
