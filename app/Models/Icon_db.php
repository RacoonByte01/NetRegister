<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icon_db extends Model
{
    //
	public $table = 'icons_db';
    protected $fillable = ['name', "group", "display"];
	public $timestamps = false;
}
