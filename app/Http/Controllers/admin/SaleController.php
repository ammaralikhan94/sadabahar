<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chemical;
use App\Barrel;
use App\Customer_amount_limit;
use App\Customer;
use App\Customer_cheque_bounce;

class saleController extends Controller
{
    public function create_sale(){
    	$chemical = Chemical::get();
        $customer = Customer::get();
    	return view('admin.sale.create_sale' , compact('chemical','customer'));
    }

    /*Ajax for getting available quantity*/
    public function get_available_quantity(Request $request){
    	$chemical_id = $_POST['chemical_id'];
    	$barrel = Barrel::where('chemical_name',$chemical_id)->get();
    	$barrel_quantity = Barrel::where('chemical_name',$chemical_id)->sum('current_volume');
        return json_encode(array('barrel_quantity' => $barrel_quantity, 'barrel' => $barrel ));
    }

    /*Ajax for getting customer cheque limit*/
    public function get_credit_limit_customer(){
        $customer_cheques = Customer_amount_limit::where('customer_id' , $_POST['item_type'])->first();
        return json_encode($customer_cheques);  
    }

    /*Ajax for getting cheque due date*/
    public function get_cheque_limit_customer(){
        $customer_cheque_limit = Customer_cheque_bounce::where('customer_id' , $_POST['customer'])->first();
        return json_encode($customer_cheque_limit);
    }
}
