<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_db extends Model
{
	public $table = 'users_db';
    protected $fillable = ['name', 'img', 'comment'];
}
