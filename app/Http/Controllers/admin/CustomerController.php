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
    	$customer  = Customer::get();
    	return view('admin.customer.create_customer',compact('customer'));
    }

    /*Add new customer*/
    public function insert_customer(Request $request)
    {	 
    	$customer_id = Customer::create([
    		'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'cheque_status' => $request->cheque_status,
            'company_name' => $request->company_name,
            'payment_mode' => $request->payment_mode
    	])->id;
        Customer_cheque_bounce::create([
            'customer_id' => $customer_id,
            'cheque_date_limit' => $request->cheque_date_limit,
            'cheque_date_amount' => $request->cheque_date_amount
        ]);
        Customer_amount_limit::create([
            'customer_id' => $customer_id,
            'customer_amount_limit' => $request->customer_amount_limit,
            'credit_date_limit' => $request->credit_date_limit,
            
        ]);
    	return redirect()->back()->with('success' , 'Customer added successfully !!');
    }

    /*Edit customer*/
    public function edit_customer($id){
        $customer = Customer::where('id' , $id)->find($id);
        $customer_cheque_bounce = Customer_cheque_bounce::orderBy('id', 'desc')->where('customer_id', $id )->first();
        $customer_amount_limit =  Customer_amount_limit::orderBy('id', 'desc')->where('customer_id', $id )->first();
        return view ('admin.customer.edit_customer' , compact('customer','customer_cheque_bounce','customer_amount_limit'));
    }

    /*Update Customer*/
    public function update_customer(Request $request){
        Customer::where('id' , $request->customer_id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'cheque_status' => $request->cheque_status,
            'company_name' => $request->company_name,
            'payment_mode' => $request->payment_mode
        ]);
        Customer_amount_limit::where('customer_id' , $request->customer_id)->update([
            'customer_amount_limit' => $request->customer_amount_limit,
            'credit_date_limit' => $request->credit_date_limit,
        ]);
        Customer_cheque_bounce::where('customer_id' , $request->customer_id)->update([
            'cheque_date_limit' => $request->cheque_date_limit,
            'cheque_date_amount' => $request->cheque_date_amount
        ]);
        return redirect()->back()->with('success' , 'Customer updated successfully !!');
    }
}
