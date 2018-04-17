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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'HomeController@logout');

Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/dashboard', ['as' => 'dashboard',  'uses' => 'HomeController@index']);
	/*CREATING SUB ADMIN ROUTES*/

	/*********************************User Routes Starts****************************************/
	Route::get('/createSubadmin/', ['as' => 'createSubadmin',  'uses' => 'admin\SubadminController@createSubadmin']);/*create users*/
	Route::post('/insertSubadmin/', ['as' => 'insertSubadmin',  'uses' => 'admin\SubadminController@insertSubadmin']);/*insert users*/
	Route::get('/editSubadmin/{id}', ['as' => 'editSubadmin',  'uses' => 'admin\SubadminController@editSubadmin']);/*edit users*/
	Route::get('/list_subadmin/', ['as' => 'list_subadmin',  'uses' => 'admin\SubadminController@list_subadmin']);/*list users*/
	Route::post('/update_subadmin/', ['as' => 'update_subadmin',  'uses' => 'admin\SubadminController@update_subadmin']);/*update users*/
	/*********************************User Routes Ends****************************************/

	/*********************************Supplier Routes Starts****************************************/
	Route::get('/create_supplier/', ['as' => 'create_supplier',  'uses' => 'admin\supplierController@create_supplier']);/*create users*/
	Route::post('/insert_supplier/', ['as' => 'insert_supplier',  'uses' => 'admin\supplierController@insert_supplier']);/*insert users*/
	Route::get('/edit_supplier/{id}', ['as' => 'edit_supplier',  'uses' => 'admin\supplierController@edit_supplier']);/*edit users*/
	Route::get('/list_supplier/', ['as' => 'list_supplier',  'uses' => 'admin\supplierController@list_supplier']);/*list users*/
	Route::post('/update_supplier/', ['as' => 'update_supplier',  'uses' => 'admin\supplierController@update_supplier']);/*update users*/
	Route::get('/supplier_payment/{id}', ['as' => 'supplier_payment',  'uses' => 'admin\supplierController@supplier_payment']);/*update users*/
	/*********************************Supplier Routes Ends****************************************/

	/*********************************Customer Routes Starts****************************************/
	Route::get('/create_customer/', ['as' => 'create_customer',  'uses' => 'admin\CustomerController@create_customer']);/*create users*/
	Route::post('/insert_customer/', ['as' => 'insert_customer',  'uses' => 'admin\CustomerController@insert_customer']);/*insert users*/
	Route::get('/edit_customer/{id}', ['as' => 'edit_customer',  'uses' => 'admin\CustomerController@edit_customer']);/*edit users*/
	Route::get('/list_customer/', ['as' => 'list_customer',  'uses' => 'admin\CustomerController@list_customer']);/*list users*/
	Route::post('/update_customer/', ['as' => 'update_customer',  'uses' => 'admin\CustomerController@update_customer']);/*update users*/
	/*********************************Customer Routes Ends****************************************/



	


});

