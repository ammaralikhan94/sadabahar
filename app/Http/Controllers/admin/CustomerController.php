<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function list_customer()
    {
    	return view('admin.customer.list_customer');
    }

    public function create_customer()
    {	
    	
    	return view('admin.customer.create_customer');
    }

    public function insert_customer(Request $request)
    {	
    	User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
    		'role_id' => $request->role_id,
    		'phone_number' => $request->phone_number,
    		'address' => $request->address,
    		'joining_date' => $request->joining_date
    	]);
    	return redirect()->back()->with('success' , 'Sub Admin added successfully !!');
    }

    public function edit_customer($id)
    {
    	$user  = User::find($id);
    	$roles = Roles::get();
    	return view('admin.customer.edit_customer' , compact('user' , 'roles'));
    }

    public function update_customer(Request $request)
    {   
    	User::where('id' , $request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            //'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'joining_date' => $request->joining_date
        ]);
        return redirect()->back()->with('success' , 'Sub Admin updated successfully !!');
    }

}
