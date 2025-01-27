<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Device_db extends Model
{
    public $table = 'user_device_db';
	public $timestamps = false;
    protected $fillable = ["id_user",'id_device'];

}
