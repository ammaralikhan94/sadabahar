<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function create_inventory()
    {	
    	return view('admin.inventory.create_inventory');
    }

    /*Insert Inventory*/
    public function insert_inventory(Request $request){
    	die('In add insert_inventory function');
    }
}
