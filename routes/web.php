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
 


Route::get('new_job', 'JobController@new_job');

// Route to upload
Route::post('upload', 'JobController@upload')->name('file_upload');

// Route to download
Route::get('download', 'JobController@downlaod')->name('file_download');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * User Account routes 
 */
Route::prefix('user')->group(function() {
	Route::get('jobs', 'UserController@jobs')->name('user.jobs');
	Route::get('jobs/{id}', 'UserController@job_items')->name('user.job_items');
	Route::get('profile', 'UserController@profile_edit')->name('user.profile.edit');
	Route::post('profile', 'UserController@submit_profile_edit')->name('user.profile.edit.submit');
	Route::get('logout', 'Auth\LoginController@userLogout')->name('user.logout');
});


/**
 * Vendor Account routes 
 */
Route::prefix('vendor')->group(function() {

	// Authentication routes 
	Route::get('/login', 'Auth\VendorLoginController@showloginform')->name('vendor.login');
	Route::post('/login', 'Auth\VendorLoginController@login')->name('vendor.login.submit');
	Route::post('/logout', 'Auth\VendorLoginController@logout')->name('vendor.logout');

	// dashboard route
	Route::get('/', 'VendorController@index')->name('vendor.dashboard');

	// jobs routes
	Route::get('jobs', 'VendorController@jobs')->name('vendor.jobs');
	Route::get('job/{id}', 'VendorController@job_items')->name('vendor.job_items');

	// Payment route
	Route::get('payments', 'VendorController@payments')->name('vendor.payments');

	// Profile routees
	Route::get('profile', 'VendorController@profile_edit')->name('vendor.profile.edit');
	Route::post('profile', 'VendorController@submit_profile_edit')->name('vendor.profile.edit.submit');


	// Not currently using
	Route::get('pricing', 'VendorController@coverpriceform')->name('vendor.pricing');
	Route::post('pricing/sizes', 'VendorController@submitsizeform')->name('vendor.pricing.submit');
	Route::post('pricing/covers', 'VendorController@submitcoverform')->name('vendor.pricing.submit');



	Route::prefix('pricing')->group(function() {
		
		// cover routes
		Route::prefix('covers')->group(function() {

			Route::get('/', 'VendorController@vendor_covers')->name('vendor.covers');
			Route::post('add_new', 'VendorController@add_new_cover')->name('vendor.new.covers');
			Route::post('delete', 'VendorController@delete_cover')->name('vendor.covers.delete');
			Route::get('prices', 'VendorController@view_cover_prices')->name('vendor.view.covers.prices');
			Route::get('prices/edit', 'VendorController@cover_prices_form')->name('vendor.covers.prices.edit');
			Route::post('prices/edit', 'VendorController@submit_cover_prices_form')->name('vendor.covers.prices.edit.submit');
		});

		// paper routes
		Route::prefix('papers')->group(function() {
			Route::get('/', 'VendorController@vendor_papers')->name('vendor.papers');
			Route::post('add_new', 'VendorController@add_new_paper')->name('vendor.papers.add_new');
			Route::post('delete', 'VendorController@delete_paper')->name('vendor.papers.delete');
			Route::get('prices', 'VendorController@view_paper_prices')->name('vendor.view.papers.prices');
			Route::get('prices/edit', 'VendorController@paper_prices_form')->name('vendor.papers.prices.edit');
			Route::post('prices/edit', 'VendorController@submit_paper_prices_form')->name('vendor.papers.prices.edit.submit');
		});

		// packaging routes
		Route::prefix('packaging')->group(function() {
			Route::get('/', 'VendorController@vendor_packagings')->name('vendor.packagings');
			Route::post('add_new', 'VendorController@add_new_packaging')->name('vendor.packagings.add_new');
			Route::post('delete', 'VendorController@delete_packaging')->name('vendor.packagings.delete');
			Route::get('prices/edit', 'VendorController@packaging_prices_form')->name('vendor.packagings.prices.edit');
			Route::post('prices/edit', 'VendorController@submit_packaging_prices_form')->name('vendor.packagings.prices.edit.submit');
		});

	});
});

