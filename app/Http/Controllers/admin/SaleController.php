<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chemical;
use App\Barrel;

class saleController extends Controller
{
    public function create_sale(){
    	$chemical = Chemical::get();
    	return view('admin.sale.create_sale' , compact('chemical'));
    }

    /*Ajax for getting available quantity*/
    public function get_available_quantity(Request $request){
    	$chemical_id = $_POST['chemical_id'];
    	$available_quantity = Barrel::where('chemical_name',$chemical_id)->get();
    	/*Barrel::*/
    }
}
