<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Roles;
use App\User;

class SubadminController extends Controller
{
    public function list_subadmin()
    {
    	$user  = User::where('id' ,'!=' , 1 )->get();
    	return view('admin.subadmin.list_subadmin' , compact('user'));
    }

    public function createSubadmin()
    {	
    	$roles = Roles::get();
    	return view('admin.subadmin.create_subadmin' , compact('roles'));
    }

    public function insertSubadmin(Request $request)
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

    public function editSubadmin($id)
    {
    	$user  = User::find($id);
    	$roles = Roles::get();
    	return view('admin.subadmin.edit_subadmin' , compact('user' , 'roles'));
    }

    public function update_subadmin(Request $request)
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

    public function delete($id)
{
    	 
    }
}
