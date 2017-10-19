<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function() {
	return view('welcome');
});
 

// User Account routes 
Route::group(['prefix' => 'account/{studio_name}'], function() {
	Route::get('/', 'JobController@index');
	Route::get('orders', 'JobController@index');
	Route::get('edit_profile', 'JobController@index');
});

Route::get('new_job', 'JobController@new_job');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');


// Vendor routes
Route::prefix('vendor')->group(function() {

	// Authentication routes 
	Route::get('/login', 'Auth\VendorLoginController@showloginform')->name('vendor.login');
	Route::post('/login', 'Auth\VendorLoginController@login')->name('vendor.login.submit');
	Route::get('/logout', 'Auth\VendorLoginController@logout')->name('vendor.logout');

	Route::get('/', 'VendorController@index')->name('vendor.dashboard');

	// jobs routes
	Route::get('jobs', 'VendorController@jobs');
	Route::get('job/{id}', 'VendorController@job_items')->name('vendor.job_items');

	Route::get('payments', 'VendorController@payments')->name('vendor.payments');

	// Profile routees
	Route::get('profile', 'VendorController@profile')->name('vendor.profile');
	Route::get('profile/edit', 'VendorController@profile_edit')->name('vendor.profile.edit');
	Route::post('profile/edit', 'VendorController@submit_profile_edit')->name('vendor.profile.edit.submit');


	// 
	Route::get('pricing', 'VendorController@coverpriceform')->name('vendor.pricing');
	Route::post('pricing/sizes', 'VendorController@submitsizeform')->name('vendor.pricing.submit');
	Route::post('pricing/covers', 'VendorController@submitcoverform')->name('vendor.pricing.submit');




	// cover routes
	Route::get('pricing/covers', 'VendorController@vendor_covers')->name('vendor.covers');
	Route::post('covers/add_new', 'VendorController@add_new_cover');
	Route::get('pricing/covers/prices', 'VendorController@view_cover_prices')->name('vendor.view.covers.prices');
	Route::get('pricing/covers/prices/edit', 'VendorController@cover_prices_form')->name('vendor.covers.prices.edit');
	Route::post('pricing/covers/prices/edit', 'VendorController@submit_cover_prices_form')->name('vendor.covers.prices.edit.submit');


	// paper routes
	Route::get('pricing/papers', 'VendorController@vendor_papers')->name('vendor.papers');
	Route::post('papers/add_new', 'VendorController@add_new_paper')->name('vendor.papers.add_new');
	Route::get('pricing/papers/prices', 'VendorController@view_paper_prices')->name('vendor.view.papers.prices');
	Route::get('pricing/papers/prices/edit', 'VendorController@paper_prices_form')->name('vendor.papers.prices.edit');
	Route::post('pricing/papers/prices/edit', 'VendorController@submit_paper_prices_form')->name('vendor.papers.prices.edit.submit');
	





});


// Route to upload
Route::post('upload', 'VendorController@upload')->name('file_upload');

// Route to download
Route::get('download', 'VendorController@downlaod')->name('file_download');