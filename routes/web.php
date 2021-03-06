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
	Route::get('/create_supplier/', ['as' => 'create_supplier',  'uses' => 'admin\SupplierController@create_supplier']);/*create users*/
	Route::post('/insert_supplier/', ['as' => 'insert_supplier',  'uses' => 'admin\SupplierController@insert_supplier']);/*insert users*/
	Route::get('/edit_supplier/{id}', ['as' => 'edit_supplier',  'uses' => 'admin\SupplierController@edit_supplier']);/*edit users*/
	Route::get('/list_supplier/', ['as' => 'list_supplier',  'uses' => 'admin\SupplierController@list_supplier']);/*list users*/
	Route::post('/update_supplier/', ['as' => 'update_supplier',  'uses' => 'admin\SupplierController@update_supplier']);/*update users*/
	Route::get('/supplier_payment/{id}', ['as' => 'supplier_payment',  'uses' => 'admin\SupplierController@supplier_payment']);/*update users*/
	Route::get('/add_payment/{id}', ['as' => 'add_payment',  'uses' => 'admin\SupplierController@add_payment']);/*add payment*/
	Route::post('/insert_supplier_amount/', ['as' => 'insert_supplier_amount',  'uses' => 'admin\SupplierController@insert_supplier_amount']);/*add payment*/
	/*********************************Supplier Routes Ends****************************************/

	/*********************************Customer Routes Starts****************************************/
	Route::get('/create_customer/', ['as' => 'create_customer',  'uses' => 'admin\CustomerController@create_customer']);/*create users*/
	Route::post('/insert_customer/', ['as' => 'insert_customer',  'uses' => 'admin\CustomerController@insert_customer']);/*insert users*/
	Route::get('/edit_customer/{id}', ['as' => 'edit_customer',  'uses' => 'admin\CustomerController@edit_customer']);/*edit users*/
	Route::get('/list_customer/', ['as' => 'list_customer',  'uses' => 'admin\CustomerController@list_customer']);/*list users*/
	Route::post('/update_customer/', ['as' => 'update_customer',  'uses' => 'admin\CustomerController@update_customer']);/*update users*/
	Route::post('/get-credit-limit-customer/', ['as' => 'get-credit-limit-customer',  'uses' => 'admin\SaleController@get_credit_limit_customer']);/*get credit limit AJAX*/
	Route::post('/get-cheque-limit-customer/', ['as' => 'get-cheque-limit-customer',  'uses' => 'admin\SaleController@get_cheque_limit_customer']);/*get cheque limit AJAX*/
	Route::post('/get-credit-limit-customer/', ['as' => 'get-credit-limit-customer',  'uses' => 'admin\InventoryController@get_credit_limit_customer']);
	/*********************************Customer Routes Ends****************************************/

	/*********************************Inventory Stars****************************************/
	Route::get('/create_inventory/', ['as' => 'create_inventory',  'uses' => 'admin\InventoryController@create_inventory']);/*create users*/
	Route::post('/insert_inventory/', ['as' => 'insert_inventory',  'uses' => 'admin\InventoryController@insert_inventory']);/*Insert users*/
	Route::get('/list_inventory/', ['as' => 'list_inventory',  'uses' => 'admin\InventoryController@list_inventory']);/*List users*/
	Route::get('/edit_inventory/{id}', ['as' => 'edit_inventory',  'uses' => 'admin\InventoryController@edit_inventory']);/*edit users*/
	Route::post('/update_inventory/', ['as' => 'update_inventory',  'uses' => 'admin\InventoryController@update_inventory']);/*update users*/
	Route::get('/delete_inventory/{id}', ['as' => 'delete_inventory',  'uses' => 'admin\InventoryController@delete_inventory']);/*update users*/
	Route::post('/get-purchase-type/', ['as' => 'get-purchase-type',  'uses' => 'admin\InventoryController@get_purchase_type']);/*get purchase type AJAX*/
	Route::post('/get-barrel-type/', ['as' => 'get-barrel-type',  'uses' => 'admin\InventoryController@get_barrel_type']);/*get barrel type AJAX*/
	Route::post('/get-credit-limit/', ['as' => 'get-credit-limit',  'uses' => 'admin\InventoryController@get_credit_limit']);
	Route::post('/get-cheque-limit/', ['as' => 'get-cheque-limit',  'uses' => 'admin\InventoryController@get_cheque_limit']);
	Route::get('/list_purchase/', ['as' => 'list_purchase',  'uses' => 'admin\InventoryController@list_purchase']);
	Route::post('/get-chemical/', ['as' => 'get-chemical',  'uses' => 'admin\InventoryController@get_chemical']);/*get chemical data from inventory AJAX*/
	Route::get('/list_purchase/', ['as' => 'list_purchase',  'uses' => 'admin\InventoryController@list_purchase']);

	/*********************************Inventory Ends****************************************/

	/*********************************Inventory Stars****************************************/
	Route::get('/create_items/', ['as' => 'create_items',  'uses' => 'admin\ItemController@create_items']);/*create users*/
	Route::post('/insert_item_type/', ['as' => 'insert_item_type',  'uses' => 'admin\ItemController@insert_item_type']);/*insert users*/
	Route::get('/list_items/', ['as' => 'list_items',  'uses' => 'admin\ItemController@list_items']);/*list users*/
	Route::get('/edit_item/{id}', ['as' => 'edit_item',  'uses' => 'admin\ItemController@edit_item']);/*edit users*/
	Route::post('/update_item', ['as' => 'update_item',  'uses' => 'admin\ItemController@update_item']);/*edit users*/
	Route::get('/delete_item_type/{id}', ['as' => 'delete_item_type',  'uses' => 'admin\ItemController@delete_item_type']);/*edit users*/
	/*********************************Inventory Ends****************************************/

	/*********************************Barell Inventory Stars****************************************/
	Route::get('/create_barrel/', ['as' => 'create_barrel',  'uses' => 'admin\InventoryController@create_barrel']);/*create users*/
	Route::post('/insert_barrel/', ['as' => 'insert_barrel',  'uses' => 'admin\InventoryController@insert_barrel']);/*Insert users*/
	Route::get('/list_barrel/', ['as' => 'list_barrel',  'uses' => 'admin\InventoryController@list_barrel']);/*Insert users*/
	/*********************************Barell Inventory Ends****************************************/

	/*********************************Expense Start****************************************/
	Route::get('/create_expense/', ['as' => 'create_expense',  'uses' => 'admin\ExpenseController@create_expense']);/*create expense*/
	/*********************************Expense END****************************************/

	/*********************************Chemical Start****************************************/
	Route::get('/create_chemical/', ['as' => 'create_chemical',  'uses' => 'admin\InventoryController@create_chemical']);/*create chemcial*/
	Route::post('/insert_chemical/', ['as' => 'insert_chemical',  'uses' => 'admin\InventoryController@insert_chemical']);/*insert chemical*/
	Route::get('/list_chemical/', ['as' => 'list_chemical',  'uses' => 'admin\InventoryController@list_chemical']);/*List chemical*/
	/*********************************Chemical END****************************************/

	/*********************************Sale Stars****************************************/
	Route::get('/create_sale/', ['as' => 'create_sale',  'uses' => 'admin\SaleController@create_sale']);/*create sale*/
	Route::post('/insert_sale/', ['as' => 'insert_sale',  'uses' => 'admin\SaleController@insert_sale']);/*create sale*/
	Route::post('/get-available-quantity/', ['as' => 'get_available_quantity',  'uses' => 'admin\SaleController@get_available_quantity']);/*create sale*/
	/*********************************Sale Ends****************************************/

	/*********************************Invoice Start************************************/
	Route::get('/invoice/', ['as' => 'invoice',  'uses' => 'admin\SaleController@invoice']);
	/*********************************Invoice End*************************************/

	/*********************************Inventory_charter Start************************************/
	Route::get('/create_charter/', ['as' => 'create_charter',  'uses' => 'admin\CharterController@create_charter']);
	Route::post('/insert_inventory_charter/', ['as' => 'insert_inventory_charter',  'uses' => 'admin\CharterController@insert_inventory_charter']);
	Route::post('/insert_sub_charter/', ['as' => 'insert_sub_charter',  'uses' => 'admin\CharterController@insert_sub_charter']);
	Route::post('/get_category/', ['as' => 'get_category',  'uses' => 'admin\CharterController@get_category']);
	Route::post('/get_subcategory/', ['as' => 'get_subcategory',  'uses' => 'admin\CharterController@get_subcategory']);
	Route::post('/insert_item/', ['as' => 'insert_item',  'uses' => 'admin\CharterController@insert_item']);
	Route::post('/get_item/', ['as' => 'get_item',  'uses' => 'admin\CharterController@get_item']);
	Route::post('/delete_item/', ['as' => 'delete_item',  'uses' => 'admin\CharterController@delete_item']);
	Route::post('/delete_sub/', ['as' => 'delete_sub',  'uses' => 'admin\CharterController@delete_sub']);
	Route::post('/delete_main/', ['as' => 'delete_main',  'uses' => 'admin\CharterController@delete_main']);
	/*********************************Inventory_charter End*************************************/

	/*********************************Brand Start*************************************/
	Route::get('/create_brand/', ['as' => 'create_brand',  'uses' => 'admin\CharterController@create_brand']);/*create brand*/
	Route::post('/insert_brand/', ['as' => 'insert_brand',  'uses' => 'admin\CharterController@insert_brand']);/*insert brand*/
	Route::get('/list_brand/', ['as' => 'list_brand',  'uses' => 'admin\CharterController@list_brand']);/*insert brand*/
	/*********************************Brand End*************************************/

	/*********************************Bank Start*************************************/
	Route::get('/create_bank/', ['as' => 'create_bank',  'uses' => 'admin\InventoryController@create_bank']);/*create bank*/
	Route::post('/insert_bank/', ['as' => 'insert_bank',  'uses' => 'admin\InventoryController@insert_bank']);/*insert bank*/
	Route::get('/list_bank/', ['as' => 'list_bank',  'uses' => 'admin\InventoryController@list_bank']);/*insert bank*/
	Route::post('/update_bank/', ['as' => 'update_bank',  'uses' => 'admin\InventoryController@update_bank']);/*insert bank*/
	Route::get('/delete_bank/{id}', ['as' => 'delete_bank',  'uses' => 'admin\InventoryController@delete_bank']);/*insert bank*/
	/*********************************Bank End*************************************/

	/**********************Get Suggestion**************/
	Route::get('/get_suggestion/', ['as' => 'get_suggestion',  'uses' => 'admin\InventoryController@get_suggestion']);
	Route::get('/get_suggestion_name/', ['as' => 'get_suggestion_name',  'uses' => 'admin\InventoryController@get_suggestion_name']);
	Route::post('/get_ajax_chemical_name/', ['as' => 'get_ajax_chemical_name',  'uses' => 'admin\InventoryController@get_ajax_chemical_name']);
	Route::post('/get_ajax_chemical_code/', ['as' => 'get_ajax_chemical_code',  'uses' => 'admin\InventoryController@get_ajax_chemical_code']);
	/**********************Get Suggestion END**************/


	/**********************PURCHASE RETURN*****************/
	Route::get('/return_purchase/', ['as' => 'return_purchase',  'uses' => 'admin\InventoryController@return_purchase']);
	Route::get('/view_invoice_purchase/{id}', ['as' => 'view_invoice_purchase',  'uses' => 'admin\InventoryController@view_invoice_purchase']);
	Route::post('/save_return/', ['as' => 'save_return',  'uses' => 'admin\InventoryController@save_return']);

	/**********************PURCHASE RETURN END*****************/
	Route::post('/check_item/', ['as' => 'check_item',  'uses' => 'admin\InventoryController@check_item']);
	/**********************PURCHASE EXCHANGE*****************/
	Route::get('/purchase_exchange/', ['as' => 'purchase_exchange',  'uses' => 'admin\InventoryController@purchase_exchange']);
	Route::post('/insert_exchange/', ['as' => 'insert_exchange',  'uses' => 'admin\InventoryController@insert_exchange']);
	/*Route::get('/view_invoice_purchase/{id}', ['as' => 'view_invoice_purchase',  'uses' => 'admin\InventoryController@view_invoice_purchase']);
	Route::post('/save_return/', ['as' => 'save_return',  'uses' => 'admin\InventoryController@save_return']);*/

	/**********************PURCHASE EXCHANGE END*****************/

    Route::get('/get_invoice/', ['as' => 'get_invoice',  'uses' => 'admin\InventoryController@get_invoice']);

	Route::post('/insert-item-type/', ['as' => 'insert-item-type',  'uses' => 'admin\ItemController@insert_item_type_ajax']);
	Route::get('/test', function () {
		return view('admin.test');
	});
});

