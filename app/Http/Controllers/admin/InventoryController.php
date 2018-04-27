<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\item_purchase_type;
use App\Supplier;
use App\Supplier_amount_limit;
use App\Supplier_cheques;
use App\Inventory;
use App\Chemical;
use App\Barrel;
use Auth;
use DB;

class InventoryController extends Controller
{
    public function create_inventory()
    {	
    	$item_type = item_purchase_type::get();
    	$supplier  = supplier::get();
        $chemical  = Chemical::get();
    	return view('admin.inventory.create_inventory' , compact('item_type','supplier','chemical'));
    }


    /*list inventory*/
    public function list_inventory(){
    	$inventory = Inventory::get();
    	return view('admin.inventory.list_inventory' , compact('inventory'));
    }
    
    /*Insert Inventory*/
    public function insert_inventory(Request $request){

        $total_quantity = $request->quantity * $request->total_quantity;
    	Inventory::create([
    		'item_name' => $request->item_name,
            'dop' => $request->dop,
            'chemical_amount' => $request->chemical_amount,
            'quantity' => $request->quantity,
            'total_amount' => $request->total_amount,   
            'supplier' => $request->supplier,
            'limit_amount' => $request->limit_amount,
            'added_by' => $request->added_by,
            'cheque_number' => $request->cheque_number,
            'cheque_image' => $request->cheque_image,
            'cheque_amount' => $request->cheque_amount,
            'limit_cheque_date' => $request->limit_cheque_date,
            'payment_status' => $request->payment_status,
            'due_date' => $request->due_date,
            'chemical_name' => $request->chemical_name,
            'payment_cash' => $request->payment_cash,
            'payment_credit' => $request->payment_credit,
            'payment_cheque' => $request->payment_cheque,
            'due_amount' => $request->due_amount,
            'purchasing_type' => $request->purchasing_type,
            'cash_recieved' => $request->cash_recieved,
            'total_quantity' => $total_quantity,
            'purchase_unit'  => $request->purchase_unit,
            'unit_purchased' => $request->unit_purchased
    	]);
        $check_previous_barrel = Barrel::where('barrel_type', $request->item_name)->where('chemical_name',$request->chemical_name)->first();
        if($check_previous_barrel != '' ){
            $total_barrel = $request->quantity + $check_previous_barrel->total_barrel;
            if($request->purchase_unit == 'gram'){
                $purchased_unit= $request->unit_purchased / 1000;
                $remaining_volume =  $request->strength - $purchased_unit ;
                $purchased_unit = $purchased_unit + $check_previous_barrel->current_volume;
                $remaining_volume = $remaining_volume + $check_previous_barrel->remaining_volume;
                $total_volume = $request->strength + $check_previous_barrel->total_volume;
            }else{
                $remaining_volume =  $request->strength - $check_previous_barrel->current_volume ;
                $purchased_unit = $check_previous_barrel->purchased_unit + $check_previous_barrel->purchased_unit;
                $remaining_volume = $remaining_volume + $check_previous_barrel->remaining_volume;
                $total_volume = $request->strength + $check_previous_barrel->total_volume;
            }
            Barrel::where('id',$check_previous_barrel->id)->update([
                'total_barrel'   => $total_barrel,
                'remaining_volume' => $remaining_volume,
                'current_volume' =>  $purchased_unit,
                'unit_purchased' =>  $purchased_unit,
                'total_volume' =>  $total_volume,     
            ]);
        }else{
           if($request->purchase_unit == 'gram'){
                $purchased_unit= $request->unit_purchased / 1000;
                $remaining_volume =  $request->strength - $purchased_unit ;
           }else{
                $purchased_unit = $request->unit_purchased ;    
                $remaining_volume = $request->strength - $request->unit_purchased;
           }
           
            Barrel::create([
                'barrel_type' => $request->item_name,
                'barrel_strength' => $request->strength,
                'barrel_measure' => $request->purchasing_type,
                'chemical_name' => $request->chemical_name,
                'empty_barrel'  => 0,
                'remaining_volume' => $remaining_volume,
                'fully_occupied_barrel' =>  $request->quantity,
                'total_barrel'   => $request->quantity,
                'item_purchase_type' => 'new' , 
                'current_volume' =>  $purchased_unit,
                'current_unit' =>$request->purchasing_type,
                'purchase_unit'  => $request->purchase_unit,
                'unit_purchased' => $purchased_unit,
                'total_volume' => $request->strength,
                'added_by'     => Auth::user()->id     
            ]);
        }
    	return redirect()->back()->with('success' , 'Item successfully added !');
    }

	/*Ajax call for getting type*/
	public function get_purchase_type(){
		$item_type = item_purchase_type::where('item_name' , $_POST['item_type'])->first();
		return json_encode($item_type);
	}

    /*For barrel*/
    public function get_barrel_type(){
        $item_type = item_purchase_type::where('id' , $_POST['item_type'])->first();
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
        $total_quantity = $request->quantity * $request->total_quantity;
		Inventory::where('id',$inventory_id)->update([
    		'item_name' => $request->item_name,
            'dop' => $request->dop,
            'chemical_amount' => $request->chemical_amount,
            'quantity' => $request->quantity,
            'total_amount' => $request->total_amount,
            'supplier' => $request->supplier,
            'limit_amount' => $request->limit_amount,
            'added_by' => $request->added_by,
            'cheque_number' => $request->cheque_number,
            'cheque_image' => $request->cheque_image,
            'cheque_amount' => $request->cheque_amount,
            'limit_cheque_date' => $request->limit_cheque_date,
            'payment_status' => $request->payment_status,
            'due_date' => $request->due_date,
            'chemical_name' => $request->chemical_name,
            'payment_cash' => $request->payment_cash,
            'payment_credit' => $request->payment_credit,
            'payment_cheque' => $request->payment_cheque,
            'due_amount' => $request->due_amount,
            'purchasing_type' => $request->purchasing_type,
            'cash_recieved' => $request->cash_recieved,
            'total_quantity' => $total_quantity
    	]);
    	return redirect()->back()->with('success' , 'Item successfully added !');
	}

	/*Delete Inventory*/
	public function delete_inventory($id){
		Inventory::where('id',$id)->delete();
		return redirect()->back()->with('success' , 'Item deleted successfully !');
	}


	/*****************************************************BARREL INVENTORY STARTS*********************************/

    /*add barrel page*/
	public function create_barrel(){
        $item_type = Inventory::get();
        $inventory_chemical = Inventory::distinct()->get(['chemical_name']);
		return view('admin.barrel.create_barrel',compact('item_type','inventory_chemical'));
	}

    /*Insert Barrel*/
    public function insert_barrel(Request $request){
        
        $added_by = Auth::user()->id;
        Barrel::create([
            'barrel_type' =>$_POST['barrel_type'] ,
            'barrel_strength' =>$_POST['barrel_strength'] ,
            'barrel_measure' =>$_POST['barrel_measure'] ,
            'chemical_name' =>$_POST['chemical_name'] ,
            'empty_barrel' =>$_POST['empty_barrel'] ,
            'fully_occupied_barrel' =>$_POST['fully_occupied_barrel'] ,
            'total_barrel' =>$_POST['total_barrel'] ,
            'item_purchase_type' =>$_POST['item_purchase_type'] ,
            'current_volume' =>$_POST['current_volume'] ,
            'current_unit' =>$_POST['current_unit'] ,
            'total_volume' =>$_POST['total_volume'] ,
            'added_by' => $added_by,
        ]);
        return redirect()->back()->with('success' , 'Barrel added successfully !');
    }

    /*List barrel*/
    public function list_barrel(){
        $barrel = Barrel::get();
        return view('admin.barrel.list_barrel',compact('barrel'));   
    }

    /**************************************************************************************************************/


    /***************************************CHEMICAL START*********************************************************/
    public function create_chemical(){
        return view('admin.chemical.create_chemical');
    }

    public function insert_chemical(Request $request){
        Chemical::insert([
            'chemical_name' => $request->chemical_name
        ]); 
        return redirect()->back()->with('success' , 'Chemical added successfully !');
    }

    public function list_chemical(){
        $chemical = Chemical::get();
        return view('admin.chemical.list_chemical',compact('chemical'));
    }

    public function get_chemical(){
        $barrel_quantity = Inventory::select('quantity')->where('chemical_name',$_POST['chemical_id'])->where('item_name',$_POST['barrel_type'])->sum('quantity');
        $total_quantity = Inventory::select('total_quantity')->where('chemical_name',$_POST['chemical_id'])->where('item_name',$_POST['barrel_type'])->sum('total_quantity');
        return json_encode($arrayName = array('barrel_quantity' =>$barrel_quantity ,'total_quantity' =>$total_quantity));
    }
}
