<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier_payment_amounts extends Model
{
    protected $table = "supplier_payment_amounts";

    protected $fillable = [
        'chemical_id', 'chemical_unit','credit_amount','return_credit_date','cheque_due_date','cheque_due_amount','credit_limit','created_by','payment_mode','limit_amount','added_by'
    ];
}
