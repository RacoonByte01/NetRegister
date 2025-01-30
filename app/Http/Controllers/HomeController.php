<?php

namespace App\Http\Controllers;

use App\Models\User_db;
use App\Models\Device_db;
use App\Models\Macs_db;
use App\Models\Ips_db;
use App\Models\User_Device_db;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$users = User_db::count();
		$devices = Device_db::count();
		$macs = Macs_db::count();
		$ips = Ips_db::count();
		$users_devices=null;
		foreach(User_db::all() as $user){
			$users_devices[$user->name] = count(User_Device_db::query()->where('id_user', '=', $user->id)->get());
		}
		return view('home', [
			'users' 	=> 	$users,
			'devices' 	=> 	$devices,
			'macs' 		=> 	$macs,
			'ips' 		=> 	$ips,
		],
		compact('users_devices')
		);
    }
}
