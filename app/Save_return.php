<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Save_return extends Model
{
    protected $table = "save_return";

    protected $fillable = [
        'inventory_id', 'quantity','cost','unit','kg','gram','rate','exc_tax','inc_code','net_total','amount_credit','cash_recieved','cheque_amount','invoice_number'
    ];
}
