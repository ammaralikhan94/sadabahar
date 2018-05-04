<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $table = "notification";

    protected $fillable = ['inventory_id', 'supplier_id','notify_title','notify_redirect','notify_role'];
}
