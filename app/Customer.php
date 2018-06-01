<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    protected $fillable = [
        'name', 'phone_number','company_name','address','cheque_status','payment_mode',
    ];
}
