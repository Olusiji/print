<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
    	$jobs = Job::where('vendor_id', 2)->get();
    	return view('vendor.jobs')->with('jobs', $jobs);
    }

    public function new_job()
    {
    	return view('new_job');
    }
}
