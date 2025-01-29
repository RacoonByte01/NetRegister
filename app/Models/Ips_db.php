<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ips_db extends Model
{
    //
	public $table = 'ips_db';
    protected $fillable = ['mac', "addres"];
	protected $primaryKey = 'mac';
	public $incrementing = false;
}
