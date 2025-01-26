<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device_db extends Model
{
    //
	public $table = 'devices_db';
    protected $fillable = ['name', "img", "icon",'comment'];
}
