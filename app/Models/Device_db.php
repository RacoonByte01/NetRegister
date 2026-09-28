<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;
use App\Models\User_Device_db;
use App\Models\User_db;

class Device_db extends Model
{
    //
	public $table = 'devices_db';
    protected $fillable = ['name', "img", "icon",'comment'];

	public function users()
	{
		$users = array();
		foreach (User_Device_db::query()->where('id_device','=',$this->id)->get() as $user) {
			array_push($users, User_db::find($user->id_user));	
		}
		return $users;
	}
	public function adduser($user_id)
	{
		$user_device = new User_Device_db([
			'id_user' 		=> 	$user_id,
			'id_device' 	=> 	$this->id
		]);
		$user_device->save();
	}
	public function setusers($users_ids)
	{
		// Delete old user 
		User_Device_db::query()->where('id_device', '=', $this->id)->delete(); 
		// Added new users
		if($users_ids!=null){
			foreach ($users_ids as $user) {
				$this->adduser($user);
			}
		}
	}
}
