<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_number extends Model
{
     protected $table = "invoice_number";

    protected $fillable = [
        'id', 'inventory_id','invoice_number'
    ];
}
