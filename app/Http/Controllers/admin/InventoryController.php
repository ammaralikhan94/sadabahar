<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item_purchase_type;
use App\Supplier;
use App\sale;
use App\Supplier_amount_limit;
use App\Supplier_cheques;
use App\Inventory;
use App\Chemical;
use App\Barrel;
use App\Notification;
use App\Item_charter;
use App\Customer;
use App\Customer_cheque_bounce;
use App\Customer_amount_limit;
use App\Customer_payment;
use App\Invoice_number;
use App\Bank;
use Auth;
use DB;

class InventoryController extends Controller
{
    public function create_inventory()
    {	
        $item_type = Item_purchase_type::get();
        $supplier  = Supplier::get();
        $customer  = Customer::get();
        $chemical  = Chemical::get();
        $invoice_number = Invoice_number::count();
        $bank = Bank::get();
        $invoice_number = $invoice_number +1;
        return view('admin.inventory.create_inventory' , compact('item_type','supplier','chemical','customer','invoice_number','bank'));
    }


    /*list inventory*/
    public function list_inventory(){
        $inventory = Inventory::get();
        $item_charter = Item_charter::get();
    	return view('admin.inventory.list_inventory' , compact('inventory','item_charter'));
    }
    
    /*Insert Inventory*/
    public function insert_inventory(Request $request){
        /*dd($_FILES['cheque_image']);*/
    
        $count = count($_POST['item_code']);
        if($request->hasfile('cheque_image'))
         {
            foreach($request->file('cheque_image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/cheque/', $name);  
                $data[] = $name;
            }
        }else{
                $data[] = '';
        }
         $image = implode(',', $data);
         $bank_name = implode(',', $request->bank_name);
         $cheque_number = implode(',', $_POST['cheque_number']);
         $cheque_amount = implode(',', $_POST['cheque_amount']);
         $limit_cheque_date = implode(',', $_POST['limit_cheque_date']); 
        for($i = 0 ; $i<$count; $i++){
            if($_POST['item_code'][$i] != '' ){
                $item_code = $_POST['item_code'][$i];
                $description = $_POST['description'][$i];
                $measurment = $_POST['measurment'][$i];
                $storage_strength = $_POST['storage_strength'][$i];
                $storeage_quantity = $_POST['storeage_quantity'][$i];
                $storage_type = $_POST['storage_type'][$i];
                $kg = $_POST['kg'][$i];
                $gram = $_POST['gram'][$i];
                $cost = $_POST['cost'][$i];
                $quantity = $_POST['quantity'][$i];
                $unit = $_POST['unit'][$i];
                $rate = $_POST['rate'][$i];
                $exc_tax = $_POST['exc_tax'][$i];
                $inc_code = $_POST['inc_code'][$i]; 
                /*$inventory_id = Inventory::create([
                'supplier'=> $request->supplier,
                'customer'=> $request->customer,
                'carriage'=> $request->carriage,
                'net_total' => $request->net_total,
                'payment_cash' => $request->payment_cash,
                'payment_credit' => $request->payment_credit,
                'payment_cheque' => $request->payment_cheque,
                'amount_credit' => $request->amount_credit,
                'cash_recieved' => $request->cash_recieved,
                'cheque_number' => $cheque_number,
                'cheque_image' => $image,
                'cheque_amount' => $cheque_amount,
                'storeage_quantity' => $storeage_quantity,
                'limit_cheque_date' => $limit_cheque_date,
                'item_code'=>$item_code,
                'dop' => '25-5-2018',
                'item_name' => $description,
                'purchasing_type' => $measurment,
                'storage_type' => $storage_type,
                'invoice_number' => $request->invoice_number,
                'quantity' => $quantity,
                'cost' => $cost,
                'gram' => $gram,
                'kg' => $kg,
                'purchase_unit' => $unit,
                'unit_purchased' => $rate,
                'exc_tax' => $exc_tax,
                'bank_name' => $bank_name,
                'inc_code' => $inc_code
            ])->id;
                Invoice_number::insert([
                    'inventory_id' =>  $inventory_id,
                    'invoice_number' => $request->invoice_number
                ]);*/
                
        $check_previous_barrel = Barrel::where('barrel_type', $storage_type)->where('chemical_name',$description)->first();
        if($check_previous_barrel != '' ){
            $total_barrel = $quantity + $check_previous_barrel->total_barrel;
            if($gram != ''){
                $purchased_unit= $gram / 1000;
                $purchased_unit = $kg + $purchased_unit;
                $current_volume = $purchased_unit + $check_previous_barrel->current_volume;
                $remaining_volume =  $check_previous_barrel->remaining_volume - $current_volume;
                $total_volume = $storeage_quantity+ $check_previous_barrel->total_volume;
                var_dump($total_volume);die;
            }else{
                $remaining_volume = $storage_strength - $check_previous_barrel->current_volume ;
                $purchased_unit = $check_previous_barrel->purchased_unit + $check_previous_barrel->purchased_unit;
                $remaining_volume = $remaining_volume + $check_previous_barrel->remaining_volume;
                $total_volume =$storage_strength + $check_previous_barrel->total_volume;
            }
            Barrel::where('id',$check_previous_barrel->id)->update([
                'total_barrel'   => $total_barrel,
                'remaining_volume' => $remaining_volume,
                'current_volume' =>  $current_volume,
                'unit_purchased' =>  $purchased_unit,
                'total_volume' =>  $total_volume,     
            ]);
        }else{
           if($gram  != ''){
                $converted_gram =  $gram / 1000;
                $purchased_unit = $kg + $converted_gram;
                $remaining_volume =  $storeage_quantity - $purchased_unit ;
           }else{
                $purchased_unit = $unit ;    
                $remaining_volume = $storeage_quantity - $request->unit_purchased;
           }
            Barrel::create([
                'barrel_type' => $storage_type,
                'barrel_strength' => $storage_strength,
                'barrel_measure' => $measurment,
                'chemical_name' => $description,
                'empty_barrel'  => 0,
                'remaining_volume' => $remaining_volume,
                'fully_occupied_barrel' =>  $quantity,
                'total_barrel'   => $quantity,
                'item_purchase_type' => 'new' , 
                'current_volume' =>  $purchased_unit,
                'current_unit' =>$storage_type,
                'purchase_unit'  => $purchased_unit,
                'unit_purchased' => $purchased_unit,
                'total_volume' => $storeage_quantity,
                'added_by'     => Auth::user()->id     
            ]);
        }
            }
        }
        $purchase_item = Inventory::where('invoice_number',$request->invoice_number)->get();
        $invoice = $request->invoice_number;
        return view('admin.invoice.invoice',compact('purchase_item','invoice'));
    	/*return redirect()->back()->with(array('success' => 'Item successfully added , If you want to delete the item click on the button below' , 'id' => $inventory_id));*/
    }

	/*Ajax call for getting type*/
	public function get_purchase_type(){
		$item_type = Item_purchase_type::where('item_name' , $_POST['item_type'])->first();
		return json_encode($item_type);
	}

    /*For barrel*/
    public function get_barrel_type(){
        $item_type = Item_purchase_type::where('item_name' , $_POST['item_type'])->first();
        return json_encode($item_type);
    }

	/*Ajax call for getting supplier limit*/
    public function get_credit_limit(){
        $supplier_amount  = Supplier_amount_limit::where('supplier_id' , $_POST['supplier'])->first();
        $credit_cash      = Inventory::where('supplier' , $_POST['supplier'])->get();
        $supplier_cheques = Supplier_cheques::where('supplier_id' , $_POST['supplier'])->first();
        $supplier = Supplier::find($_POST['supplier']);
        $cheque_limit  = $supplier_cheques->cheque_amount_limit;
        $remaining_credit = 0;
        $remaining_cheque = 0;
        foreach ($credit_cash as $key => $value) {
            if($value->cheque_amount == ''){
                $value_cheque_amount = 0;
            }else{
                $value_cheque_amount = $value->cheque_amount;
            }
            $remaining_credit = $supplier_amount->supplier_amount_limit - $value->cash_recieved;
            $remaining_cheque = $cheque_limit - $value_cheque_amount;
        }
        return json_encode(array('supplier_amount' => $supplier_amount, 'remaining_credit' => $remaining_credit , 'remaining_cheque' => $remaining_cheque , 'cheque_limit' => $cheque_limit, 'supplier' => $supplier));
    }

    /*Ajax call for getting customer limit*/
	public function get_credit_limit_customer(){
		$customer_amount  = Customer_amount_limit::where('customer_id' , $_POST['customer'])->first();
        $credit_cash      = Sale::where('customer' , $_POST['customer'])->get();
        $customer_cheques = Customer_cheque_bounce::where('customer_id' , $_POST['customer'])->first();
        $customer = Customer::find($_POST['customer']);
        $cheque_limit  = $customer_cheques->cheque_limit_amount;
        $remaining_credit = 0;
        $remaining_cheque = 0;
        foreach ($credit_cash as $key => $value) {
            $remaining_credit = $customer_amount->customer_amount_limit - $value->cash_recieved;
            $remaining_cheque = $value->cheque_amount - $cheque_limit;
        }
		return json_encode(array('customer_amount' => $customer_amount, 'remaining_credit' => $remaining_credit , 'remaining_cheque' => $remaining_cheque , 'cheque_limit' => $cheque_limit, 'customer' => $customer));
	}

	/*Ajax for getting cheque limit of supplier*/
	public function get_cheque_limit(){
		$supplier_cheques = Supplier_cheques::where('supplier_id' , $_POST['supplier'])->first();
		return json_encode($supplier_cheques);	
	}

	/*Edit Inventory*/
	public function edit_inventory($id){
		$inventory = Inventory::find($id);
		$item_type = Item_purchase_type::get();
    	$supplier  = Supplier::get();
        $chemical  = Chemical::get();
		return view('admin.inventory.edit_inventory' , compact('inventory','item_type','supplier','chemical'));
	}

	/*Update Inventory*/
	public function update_inventory(Request $request){
		$inventory_id = $_POST['inventory'];
        
        if(isset($_POST['purchase_unit']) == 'kg' && isset($_POST['purchased_kg'])){
            if($_POST['purchased_gram'] == '500'){
                  $kg = floatval($_POST['purchased_kg']+0.5);
            }
            if($_POST['purchased_gram'] == '250'){
                  (float) $kg = $_POST['purchased_kg']+0.25;
            }
            if($_POST['purchased_gram'] == '750'){
                  $kg = $_POST['purchased_kg']+0.75;
            }
            if($_POST['purchased_gram'] == '1000'){
                  $kg = $_POST['purchased_kg']+1;
            }elseif($_POST['purchased_gram'] != '500' && $_POST['purchased_gram'] !='250' && $_POST['purchased_gram'] !='750' && $_POST['purchased_gram'] != '1000'){
                     $kg = $_POST['purchased_kg'];
                }  
        }else{
            $kg = '0';
        }
        
        if(!isset($_POST['payment_cash']) && !isset($_POST['payment_credit']) && !isset($_POST['payment_cheque']) ){
            return redirect()->back()->with('error' , 'Select Payment Please !');
        }
        $total_quantity = $request->quantity * $request->total_quantity;
        
        $inventory_id = Inventory::where('id',$inventory_id)->update([
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
            'purchase_amount' => $request->purchase_amount,
            'purchase_unit'  =>$request->purchase_unit,
            'purchased_gram' => $request->purchased_gram,
            'unit_purchased' => $kg
        ]);
        $check_previous_barrel = Barrel::where('barrel_type', $request->item_name)->where('chemical_name',$request->chemical_name)->first();
        if($check_previous_barrel != '' ){
            $total_barrel = $request->quantity + $check_previous_barrel->total_barrel;
            if($request->purchase_unit == 'gram'){
                $purchased_unit= $kg / 1000;
                $remaining_volume =  $request->strength - $purchased_unit ;
                $purchased_unit = $purchased_unit + $check_previous_barrel->current_volume;
                $remaining_volume = $remaining_volume + $check_previous_barrel->remaining_volume;
                $total_volume = $request->strength + $check_previous_barrel->total_volume;
            }if($request->purchase_unit == 'kg' || $request->purchase_unit == 'quantity' || $request->purchase_unit == 'liter'){
                $remaining_volume =  $request->strength - $check_previous_barrel->current_volume;
                $purchased_unit = $kg+ $check_previous_barrel->unit_purchased;
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
          }
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
        $inventory_chemical = Inventory::distinct()->get(['item_name']);
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

    public function get_suggestion(Request $request){
        $inventory = Inventory::where('item_code', $request->term)->orWhere('item_name', 'like', '%' . $request->term . '%')->get();
        $result = array();
        foreach ($inventory as $key => $value) {
            $result[]=['id' => $value->id,'value'=>$value->item_code];
        }
        return  response()->json($result);
    }

    public function get_suggestion_name(Request $request){
        $inventory = Inventory::where('item_code', $request->term)->orWhere('item_name', 'like', '%' . $request->term . '%')->get();
        $result = array();
        foreach ($inventory as $key => $value) {
            $result[]=['id' => $value->id,'value'=>$value->item_name];
        }
        return  response()->json($result);
    }

    public function get_ajax_chemical_name(){
        $inventory = Inventory::where('item_code', $_POST['item_code'])->value('item_name');
        return json_encode($inventory);
    }

    public function get_ajax_chemical_code(){
        $inventory = Inventory::where('item_name', $_POST['item_name'])->value('item_code');
        return json_encode($inventory);
    }

    // *************************BANK CREATE*********************************************
    public function create_bank(){
        return view('admin.bank.create_bank');
    }

     public function insert_bank(Request $request){
        Bank::insert([
            'bank_name' => $request->bank_name
        ]); 
        return redirect()->back()->with('success' , 'bank added successfully !');
    }

    public function list_bank(){
        $bank = Bank::get();
        return view('admin.bank.list_bank',compact('bank'));
    }

}
