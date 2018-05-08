<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chemical;
use App\Barrel;
use App\Customer_amount_limit;
use App\Customer;
use App\Customer_cheque_bounce;
use App\Sale;

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

    /*Insert sale to database*/
    public function insert_sale(){
        if(!isset($_POST['payment_cash']) && !isset($_POST['payment_credit']) && !isset($_POST['payment_cheque']) ){
            return redirect()->back()->with('error' , 'Select Payment Please !');
        }
        if(isset($_POST) && !empty($_POST)){
            $data = $_POST;
            $count_chemical = count($_POST['chemical_name']);
            for($i = 0 ; $i < $count_chemical; $i++){
                $chemical_name = $_POST['chemical_name'][$i];
                $chemical_available_quantity = $_POST['quantity_available'][$i];
                $chemical_barrel = implode(',',$_POST['barrel_type'][$i]);
                $current_volume = implode(',',$_POST['current_volume'][$i]);
                $sale_unit = implode(',',$_POST['sale_unit'][$i]);
                $dop  = $_POST['dop'];
                $customer = $_POST['customer'];
                $limit_amount = $_POST['limit_amount'];
                $added_by = $_POST['added_by'];
                $cash_recieved = $_POST['cash_recieved'];
                $cheque_number = $_POST['cheque_number'];
                $cheque_amount = $_POST['cheque_amount'];
                $cheque_image  = $_POST['cheque_image'];
                $limit_cheque_date = $_POST['limit_cheque_date'];
                $payment_cash = (isset($_POST['payment_cash']))?$_POST['payment_cash']:'0';
                $payment_credit = (isset($_POST['payment_credit']))?$_POST['payment_credit']:'0';
                $payment_cheque = (isset($_POST['payment_cheque']))?$_POST['payment_cheque']:'0';
                $total_barrel = implode(',',$_POST['total_barrel'][$i]);
                $sale_unit = implode(',',$_POST['sale_unit'][$i]);
                $sale_price = implode(',',$_POST['sale_price'][$i]);
                $barrel_measure = implode(',',$_POST['barrel_measure'][$i]);                
                $sale_id[] = Sale::create([
                    'chemical_name' =>$chemical_name,
                    'chemical_available_quantity' =>$chemical_available_quantity,
                    'chemical_barrel'=>$chemical_barrel,
                    'current_volume' =>$current_volume,
                    'sale_unit'         =>$sale_unit,
                    'sale_price'     =>$sale_price,
                    'dop'               =>$dop,
                    'customer'       =>$customer,
                    'limit_amount'   =>$limit_amount,
                    'added_by'           =>$added_by,
                    'cash_recieved'     =>$cash_recieved,
                    'cheque_number' =>$cheque_number,
                    'cheque_amount' =>$cheque_amount,
                    'cheque_image'   =>$cheque_image,
                    'limit_cheque_date' =>$limit_cheque_date,
                    'barrel_measure' =>$barrel_measure,
                    'payment_cash'  =>$payment_cash,
                    'payment_cheque'  =>$payment_cheque,
                    'payment_credit'  =>$payment_credit,
                    'total_barrel'  =>$total_barrel,
                ])->id;
                /*echo "<pre>";*/
                $count_underloop = count($_POST['barrel_type'][$i]);
                for($j=0 ; $j<$count_underloop ; $j++){
                    $barrel_type    = $_POST['barrel_type'][$i][$j];
                    $total_barrel   = $_POST['total_barrel'][$i][$j];
                    $barrel_measure = $_POST['barrel_measure'][$i][$j];
                    $current_volume_deduction = $_POST['current_volume'][$i][$j];
                    $sale_unit = $_POST['sale_unit'][$i][$j];
                    $chemical_name  = $_POST['chemical_name'][$i];
                    $barrel_info = Barrel::where('total_barrel',$total_barrel)->where('barrel_type',$barrel_type)->where('barrel_measure',$barrel_measure)->where('current_volume',$current_volume_deduction)->get();
                    /*echo $barrel_info[0]['current_volume'];
                    echo $sale_unit;*/
                    $id = $barrel_info[0]['id'];
                    $current_volume_calculated =  (float)$barrel_info[0]['current_volume'] -  (float)$sale_unit; 
                    Barrel::where('id',$id)->update([
                        'current_volume' => $current_volume_calculated
                    ]);

                }
               
            } 
            foreach ($sale_id as $key => $value) {
                $sale_item[] = Sale::where('id',$value)->first();
            }
            
        }
        return view('admin.invoice.invoice',compact('sale_item'));
        /*return redirect()->back()->with('success' , 'Sale successfully Added ');*/
    }

}
