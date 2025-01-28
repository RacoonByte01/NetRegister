<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Macs_db extends Model
{
    //
	public $table = 'macs_db';
    protected $fillable = ['addres', "device", "icon"];
}
