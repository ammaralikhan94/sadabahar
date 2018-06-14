<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_charter extends Model
{
    protected $table = "items";

    protected $fillable = [
        'item_code', 'item_name','item_description','brand_name','purchase_price','selling_price','measurment_unit','status','parent_id','sub_id','storage'
    ];
}
