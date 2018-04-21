<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = "supplier";

    protected $fillable = [
        'name', 'phone_number','address','cheque_status','payment_mode',
    ];
}
