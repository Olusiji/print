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

                    @if (count($jobs) == 0)
                        <p>You have not gotten any job yet</p>
                    @else
                        <table border="1" class="table">
                            <tbody>
                                <tr>
                                    <td>Job Name</td>
                                    <td>Total Cost</td>
                                    <td>Order Date</td>
                                    <td>Payment status</td>
                                </tr>  
                                @foreach ($jobs as $job)   
                                    <tr>
                                        <td>{{ $job->job_name }}</td>
                                        <td>{{ $job->cost }}</td>
                                        <td>{{ $job->created_at }}</td>
                                        <td>{{ $job->vendor_payment_status }}</td>
                                    </tr>                
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <table border="1" class="table">
                        <tbody>
                            <tr>
                                <td>Total Paid</td>
                                <td>Total Unpaid</td>
                                <td>Total earnings</td>
                            </tr>   
                                <tr>
                                    <td>{{ $jobs_paid }}</td>
                                    <td>{{ $jobs_unpaid }}</td>
                                    <td>{{ $total_earnings }}</td>
                                </tr>                
                        </tbody>
                    </table>

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
