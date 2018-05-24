<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoryCharter;
use App\Sub_category_charter;
use App\Item_charter;
use App\Brand;
use App\Inventory;

class CharterController extends Controller
{
    /*View create Page*/
    public function create_charter(){
    	$count = CategoryCharter::count();
    	$parent_category = CategoryCharter::get();
        $brand= Brand::get();
    	return view('admin.inventory_charter.create_charter',compact('count','parent_category','brand'));
    }

    /*insert inventory charter*/
    public function insert_inventory_charter(Request $request){
    	CategoryCharter::create([
    		'name' => $request->category_name
    	]);
    	$count = CategoryCharter::count();
    	echo json_encode($count+1);
    }

    /*Sub category Inventory*/
    public function insert_sub_charter(Request $request){
    	Sub_category_charter::create([
    		'parent_id' => $request->parent_id,
    		'name' => $request->category_name
    	]);
    	$count = Sub_category_charter::count();
    	echo json_encode($count+1);
    }

    /*Get sub category from parent category*/
    public function get_category(){
    	$sub_cat = Sub_category_charter::where('parent_id',$_POST['parent_id'])->get();
    	echo json_encode($sub_cat);

    }

    /*Get item from submit category*/
    public function get_subcategory(){
    	$item = Item_charter::where('sub_id',$_POST['parent_id'])->get();
    	echo json_encode($item);

    }

    /*Get item*/
    public function get_item(){
    	$item = Item_charter::find($_POST['item_id']);
    	echo json_encode($item);
    }

    /*Insert Item*/
    public function insert_item(Request $request){
    	$check_previous = Item_charter::where('parent_id',$request->parent_id)->where('sub_id',$request->sub_id)->where('item_code',$request->item_code)->value('item_code');
    	if($check_previous == ''){
    		Item_charter::create([
    		'parent_id' => $request->parent_id,
    		'sub_id' => $request->sub_id,
    		'item_code' => $request->item_code,
    		'item_name' => $request->item_name,
    		'item_description' => $request->item_description,
    		'brand_name' => $request->brand_name,
    		'purchase_price' => $request->purchase_price,
    		'selling_price' => $request->selling_price,
    		'measurment_unit' => $request->measurment_unit,
    		'status' => $request->status,
    	]);
        /*Inventory::create([
            'item_name' => $request->item_name,
            'dop' => '-',
            'chemical_amount' => '-',
            'quantity' => '',
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
        ]);*/
    	echo json_encode(true);
    	}else{
    	Item_charter::where('parent_id',$request->parent_id)->where('sub_id',$request->sub_id)->where('item_code',$request->item_code)->update([
    			'parent_id' => $request->parent_id,
	    		'sub_id' => $request->sub_id,
	    		'item_code' => $request->item_code,
	    		'item_name' => $request->item_name,
	    		'item_description' => $request->item_description,
	    		'brand_name' => $request->brand_name,
	    		'purchase_price' => $request->purchase_price,
	    		'selling_price' => $request->selling_price,
	    		'measurment_unit' => $request->measurment_unit,
	    		'status' => $request->status,
    		]);
    		echo json_encode(array('status' => 'updated'));
    	}
    }

    /*Delete Item*/
    public function delete_item(){
    	Item_charter::where('id',$_POST['item_id'])->delete();
    	echo json_encode(true);
    }

    /*Delete sub*/
    public function delete_sub(){
        Sub_category_charter::where('id',$_POST['sub_select'])->delete();
        Item_charter::where('id',$_POST['sub_select'])->delete();
        echo json_encode(true);
    }

     /*Create Brand*/
    public function create_brand(){
    	return view('admin.brand.create_brand');
    }

    /*Create Brand*/
    public function insert_brand(Request $request){
        Brand::create([
            'brand_name' => $request->brand_name
        ]);
        return redirect()->back()->with('success' , 'Brand added successfully !!');
    }

    /*list Brand*/
    public function list_brand(Request $request){
        $brand = Brand::get();
        return view('admin.brand.list_brand',compact('brand'));
        
    }
}
