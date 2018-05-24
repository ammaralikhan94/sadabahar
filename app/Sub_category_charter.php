<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_category_charter extends Model
{
    protected $table = "sub_category_charter";

    protected $fillable = ['parent_id','name'];
}
