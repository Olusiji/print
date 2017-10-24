<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Return view to edit profile
     *
     */
    public function profile_edit()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('user.profile', compact('user'));
    }


    /**
     * Process profile edit form
     *
     */
    public function submit_profile_edit(Request $request)
    {
        // validates user input
        $request->validate([
        //     'name' => 'required',
        //     'photolab_name' => 'required',
             'email' => 'required',
        //     'phone_number' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        ]);

        // Gets the logged in user
        $user = Auth::user();
        
        // Updates user details in user table
        $user->update([
            'name' => $request->input('name'), 
            'studio_name' => $request->input('studio_name'), 
            'email' => $request->input('email'), 
            'phone_number' => $request->input('phone_number'), 
            'address' => $request->input('address'), 
            'city' => $request->input('city'), 
            'state' => $request->input('state')
        ]);  

        // returns profile page
        return view('user.profile', compact('user'));
    }


    /**
     * Gets user jobs
     *
     */
    public function jobs()
    {
        $id = Auth::id();
        $jobs = DB::table('jobs')->select('id', 'job_name', 'delivery_address', 'shipping_cost', 'cost', 'created_at')->where('user_id', $id)->get();
    	return view('user.jobs', ['jobs' => $jobs]);
    }


    /**
     * Gets all job items for a particular job
     *
     */
    public function job_items($job_id)
    {
        // Checks if authenticated user is linked with the job ::: this may be unnecessary
        if (Auth::id() == DB::table('jobs')->where('id', $job_id)->value('user_id'))
        {
            // get all job job items and thier details from tables
            $job_items = 
                DB::table('job_items')
                    ->leftjoin('products', 'job_items.product_id', '=', 'products.id')
                    ->leftjoin('covers', 'job_items.cover_id', '=', 'covers.id')
                    ->leftjoin('packagings', 'job_items.packaging_id', '=', 'packagings.id')
                    ->leftjoin('paper_prices', 'job_items.paper_price_id', '=', 'paper_prices.id')
                    ->leftjoin('sizes', 'paper_prices.size_id', '=', 'sizes.id')
                    ->leftjoin('paper_types', 'paper_types.id', '=', 'paper_prices.paper_type_id')


                    ->select('products.name', 'covers.cover_type',  'job_items.no_of_sheets', 'job_items.lamination', 'packagings.type as packaging_type', 'sizes.size', 'paper_types.name as paper_type' )
                    ->where('job_items.job_id', '=', $job_id)
                    ->get();

            return view('user.job_items', ['job_items' => $job_items]);

        }
    }
}
