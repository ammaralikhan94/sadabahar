<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_cheque_bounce extends Model
{
    protected $table = "customer_cheque_limit";

    protected $fillable = ['customer_id', 'cheque_date_limit','cheque_date_amount'];
}
