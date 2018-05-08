<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";
    protected $fillable =['chemical_name','chemical_available_quantity','chemical_barrel','current_volume','sale_unit','dop','customer','limit_amount','added_by','cash_recieved','cheque_number','cheque_amount','cheque_image','limit_cheque_date','payment_cash','payment_cheque','payment_credit','total_barrel','sale_price','barrel_measure'];


    public  function get_chemical(){
       return $this->hasOne('App\Chemical','id','chemical_name');
    }

    /*Get customer*/
    public  function get_customer(){
       return $this->hasOne('App\Customer','id','customer');
    }
}
