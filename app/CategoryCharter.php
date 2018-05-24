<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCharter extends Model
{
    protected $table = "category_charter";

    protected $fillable = ['name',];
}
