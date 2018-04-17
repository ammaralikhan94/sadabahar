<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use App\User;
use App\supplier_payment;

class SupplierController extends Controller
{
    public function list_supplier()
    {
    	$supplier  = Supplier::get();
    	return view('admin.supplier.list_supplier' , compact('supplier'));
    }

    public function create_supplier()
    {	
    	return view('admin.supplier.create_supplier');
    }

    public function insert_supplier(Request $request)
    {	
    	$supplier_id = Supplier::create([
    		'name' => $request->name,
    		'phone_number' => $request->phone_number,
    		'address' => $request->address,
    		'cheque_status' => $request->cheque_status,
    	])->id;
        supplier_payment::create([
            'supplier_id' => $supplier_id,
            'due_date' => $request->due_date,
            'due_amount' =>  $request->due_amount,
            'status' => $request->cheque_status
        ]);

    	return redirect()->back()->with('success' , 'Supplier added successfully !!');
    }

    public function edit_supplier($id)
    {
    	$supplier  = Supplier::find($id);
        $supplier_payment  = supplier_payment::orderBy('id', 'desc')->where('supplier_id', $id )->first();
    	return view('admin.supplier.edit_supplier' , compact('supplier','supplier_payment'));
    }

    public function update_supplier(Request $request)
    {   
        
    	Supplier::where('id' , $request->supplier_id)->update([
            'name' => $request->name,
    		'phone_number' => $request->phone_number,
    		'address' => $request->address,
    		'cheque_status' => $request->cheque_status
        ]);

        if($request->cheque_status == 'due_date' || $request->cheque_status == 'amount' ){
            supplier_payment::where('id' , $_POST['payment_id'])->update([
                'due_date' => $request->due_date,
                'due_amount' =>  $request->due_amount,
                'status' => $request->cheque_status
            ]);
        }
        return redirect()->back()->with('success' , 'Sub Admin updated successfully !!');
    }

    public function supplier_payment($id){
        
        $supplier_payment  = supplier_payment::orderBy('id', 'desc')->where('supplier_id', $id )->get();
        return view('admin.supplier.payment_supplier' ,compact('supplier_payment') );
    }
}
