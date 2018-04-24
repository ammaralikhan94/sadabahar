<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_purchase_type extends Model
{
    protected $table = "Item_purchase_type";

    protected $fillable = [
        'item_name', 'item_type','item_purchase_type'
    ];
}
