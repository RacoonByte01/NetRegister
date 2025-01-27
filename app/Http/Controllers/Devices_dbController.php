<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\Events\DarkModeWasToggled;
use App\Models\Device_db;
use App\Models\User;
use App\Models\User_db;
use App\Models\User_Device_db;
use App\Models\Icon_db;

class Devices_dbController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(DarkModeWasToggled $darkModeWasToggled)
    {
        //
		$devices = Device_db::all();
		foreach ($devices as $device) {
			$device->icon = Icon_db::query()->where('id', '=', $device->icon)->get()[0];
		}
		return view('devices/index', [
			'darkmode' => $darkModeWasToggled->darkMode->isEnabled(), 
			'devices' => $devices,
		]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DarkModeWasToggled $darkModeWasToggled)
    {
        //
		$users = User_db::all();
		$icons = Icon_db::query()->where('group', '=', 'device')->get();
		return view('devices/create', [
			'darkmode' => $darkModeWasToggled->darkMode->isEnabled(), 
			'users' => $users,
			'icons' => $icons
		]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		//
		$device = new Device_db([
			'name' 		=> 	$request->get('name'),
			'icon' 		=> 	$request->get('icon'),
			'comment' 	=> 	$request->get('comment'),
		]);
		$device -> save();
		foreach ($request->users as $user) {
			$device->adduser($user);
		}	
		return redirect()->route('device.index')->with('Success', 'Device Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DarkModeWasToggled $darkModeWasToggled, string $id)
    {
        //
		$users = User_db::all();
		$device = Device_db::find($id);
		$device->icon = Icon_db::query()->where('id', '=', $device->icon)->get()[0];
		$icons = Icon_db::query()->where('group', '=', 'device')->get();
		return view('devices/edit', [
			'darkmode' => $darkModeWasToggled->darkMode->isEnabled(), 
			'users' => $users, 
			'device' => $device,
			'icons' => $icons
		]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
		$device = Device_db::find($id);
		$device->name = $request->name;
		$device->comment = $request->comment;
		$device->icon = $request->icon;

		$device->save();
		
		$device->setusers($request->users);
		
		return redirect()->route('device.index')->with('Success', 'Device Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
		$device = Device_db::find($id);
		$device->delete();
		return redirect()->route('device.index')->with('Success', 'Device Delete');
    }
}
