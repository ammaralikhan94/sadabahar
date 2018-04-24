<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\item_purchase_type;
use App\Supplier;
use App\Supplier_amount_limit;
use App\Supplier_cheques;
use App\Inventory;

class InventoryController extends Controller
{
    public function create_inventory()
    {	
    	$item_type = item_purchase_type::get();
    	$supplier  = supplier::get();
    	return view('admin.inventory.create_inventory' , compact('item_type','supplier'));
    }


    /*list inventory*/
    public function list_inventory(){
    	$inventory = Inventory::get();
    	return view('admin.inventory.list_inventory' , compact('inventory'));
    }
    
    /*Insert Inventory*/
    public function insert_inventory(Request $request){
    	Inventory::create([
    		'item_name' => $request->item_name,
    		'dop' => $request->dop,
    		'chemical_amount' => $request->chemical_amount,
    		'quantity' => $request->quantity,
    		'total_amount' => $request->total_amount,
    		'supplier' => $request->supplier,
    		'payment_mode' => $request->payment_mode,
    		'limit_amount' => $request->limit_amount,
    		'added_by' => $request->added_by,
    		'cheque_number' => $request->cheque_number,
    		'cheque_image' => $request->cheque_image,
    		'limit_cheque_date' => $request->limit_cheque_date,
    		'payment_status' => $request->payment_status,
    		'due_date' => $request->due_date,
    		'due_amount' => $request->due_amount,
    		'purchasing_type' => $request->purchasing_type,
    		'total_quantity' => $request->total_quantity
    	]);
    	return redirect()->back()->with('success' , 'Item successfully added !');
    }

	/*Ajax call for getting type*/
	public function get_purchase_type(){
		$item_type = item_purchase_type::where('item_name' , $_POST['item_type'])->first();
		return json_encode($item_type);
	}

	/*Ajax call for getting supplier limit*/
	public function get_credit_limit(){
		$supplier_amount = Supplier_amount_limit::where('supplier_id' , $_POST['supplier'])->first();
		return json_encode($supplier_amount);
	}

	/*Ajax for getting cheque limit of supplier*/
	public function get_cheque_limit(){
		$supplier_cheques = Supplier_cheques::where('supplier_id' , $_POST['supplier'])->first();
		return json_encode($supplier_cheques);	
	}

	/*Edit Inventory*/
	public function edit_inventory($id){
		$inventory = Inventory::find($id);
		$item_type = item_purchase_type::get();
    	$supplier  = supplier::get();
		return view('admin.inventory.edit_inventory' , compact('inventory','item_type','supplier'));
	}

	/*Update Inventory*/
	public function update_inventory(Request $request){
		$inventory_id = $_POST['inventory_id'];
		Inventory::where('id',$inventory_id)->update([
    		'item_name' => $request->item_name,
    		'dop' => $request->dop,
    		'chemical_amount' => $request->chemical_amount,
    		'quantity' => $request->quantity,
    		'total_amount' => $request->total_amount,
    		'supplier' => $request->supplier,
    		'payment_mode' => $request->payment_mode,
    		'limit_amount' => $request->limit_amount,
    		'added_by' => $request->added_by,
    		'cheque_number' => $request->cheque_number,
    		'cheque_image' => $request->cheque_image,
    		'limit_cheque_date' => $request->limit_cheque_date,
    		'payment_status' => $request->payment_status,
    		'due_date' => $request->due_date,
    		'due_amount' => $request->due_amount,
    		'purchasing_type' => $request->purchasing_type,
    		'total_quantity' => $request->total_quantity
    	]);
    	return redirect()->back()->with('success' , 'Item successfully added !');
	}

	/*Delete Inventory*/
	public function delete_inventory($id){
		Inventory::where('id',$id)->delete();
		return redirect()->back()->with('success' , 'Item deleted successfully !');
	}


	/*****************************************************BARREL INVENTORY STARTS*********************************/

	public function create_barrel(){
        $item_type = item_purchase_type::get();
		return view('admin.barrel.create_barrel',compact('item_type'));
	}
}
