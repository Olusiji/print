<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Cover;
use App\Vendor;
use App\Size;
use App\PaperPrice;

class VendorController extends Controller
{


    var $id;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:vendor');

        $this->id = Auth::id();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.vendor');
    }

    public function jobs()
    {
        $id = Auth::id();
        $jobs = DB::table('jobs')->select('id', 'job_name', 'cost', 'created_at')->where('vendor_id', $id)->get();
    	return view('vendor.jobs', ['jobs' => $jobs]);
    }

    // Gets all job items for a particular job
    public function job_items($job_id)
    {
        // Checks if authenticated user is linked with the job ::: this may be unnecessary
        if (Auth::id() == DB::table('jobs')->where('id', $job_id)->value('vendor_id'))
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

            return view('vendor.job_items', ['job_items' => $job_items]);

        }
    }

    // Returns view for the vendors payment page
    public function payments()
    {
        $id = Auth::id();

        // gets all vendors jobs
        $jobs = DB::table('jobs')->select('id', 'job_name', 'cost', 'created_at', 'vendor_payment_status')->where('vendor_id', Auth::id())->get();

        // gets all unpaid jobs
        $jobs_unpaid = DB::table('jobs')->where('vendor_id', Auth::id())->where('vendor_payment_status', 'unpaid')->sum('cost');

        // gets all paid jobs
        $jobs_paid = DB::table('jobs')->where('vendor_id', Auth::id())->where('vendor_payment_status', 'paid')->sum('cost');

        // sum of vendors total earnings
        $total_earnings = $jobs_paid + $jobs_unpaid;

        return view('vendor.payments', ['jobs' => $jobs, 'jobs_unpaid' => $jobs_unpaid, 'jobs_paid' => $jobs_paid, 'total_earnings' => $total_earnings]);
    }


    // View profile page
    public function profile()
    {
        $id = Auth::id();
        $vendor = Vendor::find($id);
        return view('vendor.profile', compact('vendor'));
    }

    public function profile_edit()
    {
        $id = Auth::id();
        $vendor = Vendor::find($id);
        return view('vendor.profile_edit', compact('vendor'));
    }

    public function submit_profile_edit(Request $request)
    {
        // validates vendors input
        // $request->validate([
        //     'name' => 'required',
        //     'photolab_name' => 'required',
        //     'email' => 'required',
        //     'phone_number' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        // ]);

        // gets the id of the signed in vendor
        $id = Auth::id();

        // Finds the current vendor 
        $vendor = Vendor::find($id);
        
        // Updates vendor details in vendor table
        $vendor->update([
            'name' => $request->input('name'), 
            'photolab_name' => $request->input('photolab_name'), 
            'email' => $request->input('email'), 
            'phone_number' => $request->input('phone_number'), 
            'address' => $request->input('address'), 
            'city' => $request->input('city'), 
            'state' => $request->input('state')
        ]);  

        // returns profile page
        return view('vendor.profile', compact('vendor'));
    }


    // controller for submit size ajax request
    // controller not current being used since all vendor print all avaliable sizes
    public function submitsizeform(Request $request)
    {

        // stores ajax post value
        $sizes_form_data = $request->sizes;

        // Array to store all widths
        $width = [];

        // Array to store all heights
        $height = [];

        // Array to store the differen sizes (i.e 12by2 => which width by height)
        $sizes = [];

        // Store widths and heights in sepreate arrays
        for($a = 0, $b = count($sizes_form_data), $pos = 1; $a < $b; $a++)
        {
            if ($sizes_form_data[$a]['name'] == 'width')
            {
                $width[] = $sizes_form_data[$a]['value'];
            }
            elseif ( $sizes_form_data[$a]['name'] == 'height' ) 
            {
                $height[] = $sizes_form_data[$a]['value'];
            }

        }

        // Iterates through width[] and heigth[] ... creates and stores actual size values
        for($a = 0, $b = count($height); $a < $b; $a++)
        {
            $sizes[] = $width[$a] .'by'. $height[$a];

        }

        /** check if size is in size table, returns the id 
         *  and stores the size and corressponding id in an associative array
         *
         *  if size is not in the table 
         *  it adds the size, returns the id  
         *  and stores the size and corresponding id in an associative array
         */

        // Associative array for size and thier size_table_id 
        $size_id_pair = [];

        // iterates through each size in sizes[]
        for ($a = 0, $b = count($sizes); $a < $b; $a++)
        {
            // Checks if size exist in size table 
            // returns null when it does not exist
            $table_size = Size::where('name', '=', $sizes[$a])->first();
            if ($table_size === null) 
            {
               // Creates a new entry on the size table  
               $new_size = Size::create([ 'name' => $sizes[$a] ]);

               // add the size and id pair to an array
               $size_id_pair += [$new_size->name => $new_size->id];
            }
            else
            {
               //  // add the size and id pair to an array
               $size_id_pair += [$table_size->name => $table_size->id];

            }

        }

        return ($size_id_pair);



    }


    // vendor views all covers he currently offers and can add new ones
    // need to add delete cover method should probably use ajax
    public function vendor_covers()
    {
        // gets the id of the signed in vendor
        $id = Auth::id();

        // 
        $covers = 
            DB::table('covers')
                ->where('vendor_id', $id)->pluck('cover_type');


        $cover_types = array_unique($covers->toArray());
        
        return view('vendor.covers', compact('cover_types'));
        
    }

    // Adds new cover typr for a vendor
    public function add_new_cover(Request $request)
    {

        // gets the id of the signed in vendor
        $id = Auth::id();


        $new_covers = $request->new_cover;


        // Gets d ids of all sizes from the sizes table
        $sizes = DB::table('sizes')->pluck('id');

        
        // checks if cover type exist for the vendor
        for ($i=0, $a = count($new_covers); $i < $a ; $i++) 
        { 
            // Checks if cover exist in cover table 
            // returns null when it does not exist
            $table_cover = Cover::where([ ['cover_type', '=', $new_covers[$i]], ['vendor_id', '=', $id] ])->first();
            if ($table_cover === null) 
            {
               // Creates a new entries for all cover sizes for a particular cover type on the covers table  
                for ($j=0, $b = count($sizes); $j < $b; $j++) 
                { 
                    $new_cover = Cover::create([ 'cover_type' => $new_covers[$i], 'vendor_id' => $id, 'size_id' => $sizes[$j] ]);
                }
            }
        }
        

        return $this->vendor_covers();   
    }


    // view current cover prices
    public function view_cover_prices()
    {
        // Gets the id of logged in vendor
        $id = Auth::id();

        // Gets all the cover types the vendor makes
        $cover_types = DB::table('covers')->where('vendor_id', '=', $id)->pluck('cover_type');

        // remove all duplicates of cover types
        $cover_types = array_unique($cover_types->toArray());



        $covers = DB::table('covers')
                        ->join('sizes', 'sizes.id', '=', 'covers.size_id')
                        ->select('covers.id', 'covers.cover_type', 'sizes.size', 'covers.price')
                        ->where('vendor_id', '=', $id)
                        ->get();


        return view( 'vendor.cover_prices', compact('covers', 'cover_types') );
    }


    // form to edit cover prices
    public function cover_prices_form()
    {
        // Gets the id of logged in vendor
        $id = Auth::id();

        // Gets all the cover types the vendor makes
        $cover_types = DB::table('covers')->where('vendor_id', '=', $id)->pluck('cover_type');




        // removes all duplicate cover types
        $cover_types = array_unique($cover_types->toArray());



        $covers = DB::table('covers')
                        ->join('sizes', 'sizes.id', '=', 'covers.size_id')
                        ->select('covers.id', 'covers.cover_type', 'sizes.size', 'covers.price')
                        ->where('vendor_id', '=', $id)
                        ->get();



        return view('vendor.edit_cover_prices', compact('covers', 'cover_types') );
    }


   
    // method to process input from cover prices form
    public function submit_cover_prices_form(Request $request)
    {
        $id = Auth::id();

        $form_inputs = $request->all();


        foreach ($form_inputs as $key => $value) 
        {
            if ($key != '_token')
            {
                Cover::where('id', $key)
                    ->where('vendor_id', $id)
                    ->update(['price' => $value]);
            }
        }

        return $this->view_cover_prices();
    }



    // edit paper prices
    public function vendor_papers()
    {
        // gets the id of the signed in vendor
        $id = Auth::id();

        // 
        $vendor_paper_types = 
            DB::table('paper_prices')
                ->join('paper_types', 'paper_types.id', '=', 'paper_prices.paper_type_id')
                ->where('vendor_id', $id)
                ->pluck('paper_types.name');


        $vendor_paper_types = array_unique($vendor_paper_types->toArray());

        $paper_types = 
            DB::table('paper_types')
                ->select('id', 'name')
                ->get();


        
        return view('vendor.papers', compact('vendor_paper_types', 'paper_types') );

    }


    // process added paper types from form
    public function add_new_paper(Request $request)
    {

        // gets the id of the signed in vendor
        $id = Auth::id();

        // gets all the input from form
        $form_inputs = $request->paper_types;


        // Gets d ids of all sizes from the sizes table
        $sizes = DB::table('sizes')->pluck('id');

        // iterates through each 
        for ($i=0, $j = count($form_inputs); $i < $j ; $i++)
        {

            // checks the paper_prices table if there is any entry of that particular paper type
            $vendor_paper_price = PaperPrice::where([ ['paper_type_id', '=', $form_inputs[$i] ], ['vendor_id', '=', $id] ])->first();
            if ($vendor_paper_price === null) 
            {
               // Creates a new entries for all sizes for a particular paper type on the paper_prices table  
                for ($k=0, $b = count($sizes); $k < $b; $k++) 
                { 
                    $new_cover = PaperPrice::create([ 'paper_type_id' => $form_inputs[$i], 'vendor_id' => $id, 'size_id' => $sizes[$k] ]);
                }
            }
        }



        return $this->vendor_papers();

    }
    


    // view paper prices
    public function view_paper_prices()
    {
        // Gets the id of logged in vendor
        $id = Auth::id();

        // Gets all the cover types the vendor makes
        $paper_types = DB::table('paper_prices')
                            ->join('paper_types', 'paper_types.id', '=', 'paper_prices.paper_type_id')
                            ->where('vendor_id', '=', $id)
                            ->pluck('paper_types.name');




        // removes all duplicate cover types
        $paper_types = array_unique($paper_types->toArray());


        // get paper type size details
        $paper_prices = DB::table('paper_prices')
                        ->join('paper_types', 'paper_types.id', '=', 'paper_prices.paper_type_id')
                        ->join('sizes', 'sizes.id', '=', 'paper_prices.size_id')
                        ->select('paper_prices.id', 'paper_prices.price', 'paper_types.name as paper_type', 'sizes.size')
                        ->where('vendor_id', '=', $id)
                        ->get();



        return view('vendor.paper_prices', compact('paper_types', 'paper_prices') );
    }



    // form to edit paper prices
    public function paper_prices_form()
    {
        // Gets the id of logged in vendor
        $id = Auth::id();

        // Gets all the cover types the vendor makes
        $paper_types = DB::table('paper_prices')
                            ->join('paper_types', 'paper_types.id', '=', 'paper_prices.paper_type_id')
                            ->where('vendor_id', '=', $id)
                            ->pluck('paper_types.name');




        // removes all duplicate cover types
        $paper_types = array_unique($paper_types->toArray());


        // get paper type size details
        $paper_prices = DB::table('paper_prices')
                        ->join('paper_types', 'paper_types.id', '=', 'paper_prices.paper_type_id')
                        ->join('sizes', 'sizes.id', '=', 'paper_prices.size_id')
                        ->select('paper_prices.id', 'paper_prices.price', 'paper_types.name as paper_type', 'sizes.size')
                        ->where('vendor_id', '=', $id)
                        ->get();



        return view('vendor.edit_paper_prices', compact('paper_types', 'paper_prices') );
    }


    public function submit_paper_prices_form()
    {
        //
        $id = Auth::id();

        $form_inputs = $request->all();

        //
        foreach ($form_inputs as $key => $value) 
        {
            if ($key != '_token')
            {
                PaperPrice::where('id', $key)
                    ->where('vendor_id', $id)
                    ->update(['price' => $value]);
            }
        }

        return $this->view_paper_prices();

    }



}
