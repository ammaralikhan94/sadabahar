<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrel extends Model
{
    protected $table = "barrel";

    protected $fillable = [
        'barrel_type','barrel_strength','barrel_measure','chemical_name','empty_barrel','fully_occupied_barrel','total_barrel','item_purchase_type','current_volume','current_unit','total_volume','added_by','remaining_volume','purchase_unit','unit_purchased'
    ];

    public  function get_barrel_type(){
    	return $this->hasOne('App\item_purchase_type','id','barrel_type');
    }

    public  function get_barrel_chemical(){
    	return $this->hasOne('App\chemical','id','chemical_name');
    }
}
