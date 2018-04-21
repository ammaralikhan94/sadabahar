<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_payment extends Model
{
    protected $table = "customer_payment_status";

    protected $fillable = ['customer_id', 'due_date','due_amount','status'];
}
