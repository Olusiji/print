@extends('layouts.vendor_app')

@section('title', 'Packaging Prices')

@section('payments_nav_class', 'active')

@section('content')


<div class="row">
    <div class="col-md-8">
        <!-- PANEL HEADLINE -->
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Job Payments</h3>
                <p class="panel-subtitle"></p>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Job Name</td>
                            <td>Total Cost</td>
                            <td>Order Date</td>
                            <td>Payment status</td>
                        </tr>  
                    </thead>
                    <tbody>
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
            </div>
        </div>
        <!-- END PANEL HEADLINE -->
    </div>
    <div class="col-md-4">
        <!-- PANEL NO PADDING -->
        <div class="panel">
            <div class="row">
                <div class="col-md-12">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                        <p>
                            <span class="number">{{ $total_earnings }}</span>
                            <span class="title">Total Earnings</span>
                        </p>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                        <p>
                            <span class="number">{{ $jobs_paid }}</span>
                            <span class="title">Paid amount</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                        <p>
                            <span class="number">{{ $jobs_unpaid }}</span>
                            <span class="title">Unpaid amount</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PANEL NO PADDING -->
    </div>
</div>

@endsection
