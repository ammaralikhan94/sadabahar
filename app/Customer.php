<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    protected $fillable = [
        'name', 'phone_number','location','payment_mode','payment_status','rating','cheque_bounced','payment_mode','cheque_status',
    ];
}
