<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange_invoice extends Model
{
    protected $table = "exchange_invoice";

    protected $fillable = [
        'id', 'inventory_id','invoice_number'
    ];
}
