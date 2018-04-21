<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier_cheques extends Model
{
    protected $table = "supplier_cheques";

    protected $fillable = ['supplier_id', 'cheque_date_limit','cheque_amount_limit'];
}
