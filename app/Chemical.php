<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chemical extends Model
{
    protected $table = "chemical";

    protected $fillable = [
        'chemical_name'
    ];
}
