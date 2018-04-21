<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_amount_limit extends Model
{
    protected $table = "customer_amount_limit";

    protected $fillable = ['customer_id', 'customer_amount_limit'];
}
