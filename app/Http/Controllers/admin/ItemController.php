<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item_purchase_type;

class ItemController extends Controller
{	
	/*view add item form*/
    public function create_items(){
        $items = Item_purchase_type::get();
    	return view('admin.items.create_items', compact('items'));
    }

    /*Insert Item Form*/
    public function insert_item_type(Request $request){
        Item_purchase_type::create([
            'item_name' => $request->item_name,
            'item_type' => $request->item_type,
            'item_purchase_type' => $request->item_purchase_type
        ]);
        return redirect()->back()->with('success' , 'Item Purchase Type added successfully !');
    }

    public function insert_item_type_ajax(){
    	Item_purchase_type::create([
    		'item_name' => $_POST['item_name'],
    		'item_type' => $_POST['item_type'],
    		'item_purchase_type' => $_POST['item_purchase_type']
    	]);
    	return json_encode(true);
    }

    /*list Add purchase types*/
    public function list_items(){
    	$items = Item_purchase_type::get();
    	return view('admin.items.list_items', compact('items'));
    }

    /*Edit Items*/
    public function edit_item($id){
    	$item = Item_purchase_type::find($id);
    	return view('admin.items.edit_item' , compact('item'));
    }

    /*Update Purchase type*/
    public function update_item(Request $request){
    	Item_purchase_type::where('id' , $request->item_id)->update([
    		'item_name' => $request->item_name,
    		'item_type' => $request->item_type,
    		'item_purchase_type' => $request->item_purchase_type
    	]);
    	return redirect()->back()->with('success' , 'Item Purchase Type added successfully !');
    }

    /*Delete item*/
    public function delete_item_type($id){
    	Item_purchase_type::where('id' , $id)->delete();
    	return redirect()->back()->with('success' , 'Item Purchase Type deleted  added successfully !');
    }

    
}
