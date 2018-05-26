<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = "inventory";

    protected $fillable = [
        'item_name', 'dop','chemical_amount','quantity','supplier','payment_mode','limit_amount','cash_recieved','cheque_number','cheque_image','limit_cheque_date','cheque_amount','payment_cash','payment_credit','payment_cheque','payment_status','due_date','due_amount','purchasing_type','total_quantity','purchase_unit','unit_purchased','purchase_amount','purchased_gram','item_code','carriage','storage_type','net_total','invoice_number','inc_code','exc_tax'
    ];

     public  function supplier_name(){
    	 return $this->hasOne('App\Supplier','id','supplier_id');
    }
    
    public  function get_chemical(){
    	 return $this->hasOne('App\Chemical','id','chemical_name');
    }
}
