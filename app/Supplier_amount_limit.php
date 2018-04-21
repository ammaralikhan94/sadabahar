<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier_amount_limit extends Model
{
    protected $table = "supplier_amount_limit";

    protected $fillable = ['supplier_id','supplier_amount_limit'];
}
