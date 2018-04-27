<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = "inventory";

    protected $fillable = [
        'item_name', 'dop','chemical_amount','quantity','total_amount','supplier','payment_mode','limit_amount','added_by','cash_recieved','cheque_number','cheque_image','limit_cheque_date','cheque_amount','payment_cash','payment_credit','payment_cheque','payment_status','due_date','due_amount','purchasing_type','total_quantity','chemical_name','purchase_unit','unit_purchased'
    ];

     public  function supplier_name(){
    	 return $this->hasOne('App\Supplier','id','supplier_id');
    }
    public  function get_chemical(){
    	 return $this->hasOne('App\Chemical','id','chemical_name');
    }
}
