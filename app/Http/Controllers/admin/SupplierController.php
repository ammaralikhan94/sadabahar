<?php


namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use App\User;
use App\supplier_payment;
use App\Supplier_cheques;
use App\supplier_amount_limit;
use App\Inventory;

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
            'payment_mode' => $request->payment_mode
    	])->id;
        /*supplier_payment::create([
            'supplier_id' => $supplier_id,
            'due_date' => $request->due_date,
            'due_amount' =>  $request->due_amount,
            'status' => $request->cheque_status
        ]);*/
        Supplier_cheques::create([
            'supplier_id' => $supplier_id,
            'cheque_date_limit' => $request->cheque_date_limit,
            'cheque_amount_limit' => $request->cheque_amount_limit
        ]);
        Supplier_amount_limit::create([
            'supplier_id' => $supplier_id,
            'supplier_amount_limit' => $request->supplier_amount_limit,
            'credit_date_limit' => $request->credit_date_limit
        ]);
    	return redirect()->back()->with('success' , 'Supplier added successfully !!');
    }

    public function edit_supplier($id)
    {
    	$supplier  = Supplier::find($id);
        $supplier_payment  = supplier_payment::orderBy('id', 'desc')->where('supplier_id', $id )->first();
        $Supplier_cheques  = Supplier_cheques::orderBy('id', 'desc')->where('supplier_id', $id )->first();
        $supplier_amount_limit  = supplier_amount_limit::orderBy('id', 'desc')->where('supplier_id', $id )->first();
    	return view('admin.supplier.edit_supplier' , compact('supplier','supplier_payment' , 'supplier_amount_limit' , 'Supplier_cheques'));
    }

    public function update_supplier(Request $request)
    {   
        
        
    	Supplier::where('id' , $request->supplier_id)->update([
            'name' => $request->name,
    		'phone_number' => $request->phone_number,
    		'address' => $request->address,
    		'cheque_status' => $request->cheque_status,
            'payment_mode'  => $request->payment_mode
        ]);

        Supplier_cheques::where('supplier_id' , $request->supplier_id)->update([
            'cheque_date_limit' => $request->cheque_date_limit,
            'cheque_amount_limit' => $request->cheque_amount_limit
        ]);
        Supplier_amount_limit::where('supplier_id' , $request->supplier_id)->update([
            'supplier_amount_limit' => $request->supplier_amount_limit,
            'credit_date_limit' => $request->credit_date_limit
        ]);
        if($request->cheque_status == 'due_date' || $request->cheque_status == 'amount' ){
            supplier_payment::create([
                'due_date' => $request->due_date,
                'due_amount' =>  $request->due_amount,
                'status' => $request->cheque_status
            ]);
        }
        return redirect()->back()->with('success' , 'Supplier updated successfully !!');
    }

    public function supplier_payment($id){
        /*$supplier_payment  = supplier_payment::orderBy('id', 'desc')->where('supplier_id', $id )->get();*/
        $supplier_payment = Inventory::orderBy('id', 'desc')->where('supplier',$id)->get();
        
        return view('admin.supplier.payment_supplier' ,compact('supplier_payment'));
    }

    /*Add supplier payment*/
    public function add_payment($id){
        $credit_limit = Supplier_amount_limit::where('supplier_id',$id)->value('supplier_amount_limit');
        $cheque_limit = Supplier_cheques::where('supplier_id',$id)->first();    
        return view('admin.supplier.add_payment' , compact('credit_limit' ,'cheque_limit'));
    }

    public function insert_supplier_amount(Request $request){
        if(!isset($_POST['post_cheque']) && !isset($_POST['credit_limit'])){
            return redirect()->back()->with('error' , 'Select "Credit limit" or "Post date cheque" to add supplier payment . ');       
        }
        echo "<pre>";
        var_dump($_POST);die;
    }
}
