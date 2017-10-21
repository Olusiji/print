<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class VendorLoginController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest:vendor',['except' =>['logout']]);
    }

    public function showloginform()
    {
    	return view('auth.vendor-login');
    }

    public function login(Request $request)
    {
    	// validate the form data
    	$this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:7',
        ]);

    	// Attempt to log the user in
    	if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) 
    	{
    		// if successful, then redirect to thier intended location
    		return redirect()->intended(route('vendor.dashboard'));
    	}

    	// if  unsucessful redirect back to the login with the form data
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();
 
        return redirect('vendor/login');
    }

}


