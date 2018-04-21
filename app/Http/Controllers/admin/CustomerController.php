<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Customer;
use App\Customer_cheque_bounce;
use App\Customer_amount_limit;
use App\Customer_payment;

class CustomerController extends Controller
{
    public function list_customer()
    {
    	$customer  = Customer::get();
        return view('admin.customer.list_customer' , compact('customer'));
    }

    public function create_customer()
    {	
    	
    	return view('admin.customer.create_customer');
    }

    public function insert_customer(Request $request)
    {	

        
    	$customer_id = Customer::create([
    		'name' => $request->name,
    		'phone_number' => $request->phone_number,
    		'location' => $request->address,
            'payment_mode' => $request->payment_mode,
            'cheque_status' => $request->cheque_status
    	])->id;
        Customer_cheque_bounce::create([
            'customer_id'        => $customer_id ,
            'cheque_date_limit'  => $request->cheque_date_limit,
            'cheque_date_amount' => $request->cheque_date_amount,  
        ]);
        Customer_amount_limit::create([
            'customer_id'   =>  $customer_id,
            'customer_id_amount_limit'   =>  $request->customer_id_amount_limit
        ]);
       Customer_payment::create([
            'customer_id' => $customer_id,
            'due_date'      =>  $request->due_date,
            'due_amount'    => $request->due_amount,
            'status'        => $request->cheque_status
        ]);
    	return redirect()->back()->with('success' , 'Sub Admin added successfully !!');
    }

}
