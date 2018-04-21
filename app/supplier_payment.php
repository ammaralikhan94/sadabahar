<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier_payment extends Model
{
    protected $table = "supplier_payment";

    protected $fillable = ['supplier_id', 'due_date','due_amount','status',
    ];

    public  function supplier_name(){
    	 return $this->hasOne('App\Supplier','id','supplier_id');
    }
}
