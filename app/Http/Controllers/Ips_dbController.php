<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\Events\DarkModeWasToggled;
use App\Models\Ips_db;
use App\Models\Macs_db;
use App\Models\Device_db;
use App\Models\Icon_db;
use Illuminate\Support\Facades\DB;

class Ips_dbController extends Controller
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
     * Display a listing of the resource.
     */
    public function index(DarkModeWasToggled $darkModeWasToggled)
    {
        //
		$ips = Ips_db::all();
		foreach ($ips as $ip) {
			$ip->mac = Macs_db::find($ip->mac);
		}
		return view('ips/index',[
			'darkmode' 	=> 	$darkModeWasToggled->darkMode->isEnabled(),
			'ips' 		=> 	$ips
		]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DarkModeWasToggled $darkModeWasToggled)
    {
		//
		return view('ips/create',[
			'darkmode' 	=> 	$darkModeWasToggled->darkMode->isEnabled(),
			'macs' 		=> 	$this->getMacsNotBluethood()
		]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
		$ip = new Ips_db([
			'mac' 		=> 	$request->mac,
			'addres' 	=> 	$request->addres
		]);
		$ip->save();
		return redirect()->route('ip.index')->with('Success', 'IP Added');
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
		$ip = Ips_db::find($id);
		$ip->mac = Macs_db::find($ip->mac);
		return view('ips/edit',[
			'darkmode' 	=> 	$darkModeWasToggled->darkMode->isEnabled(),
			'macs' 		=> 	$this->getMacsNotBluethood(),
			'ip' 		=> 	$ip
		]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
		$ip = Ips_db::find($id);
		$ip->addres = $request->get('addres');
		$ip->mac = $request->get('mac');
		$ip->update();
		return redirect()->route('ip.index')->with('Success', 'IP Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
		$ip = Ips_db::find($id);
		$ip->delete();
		return redirect()->route('ip.index')->with('Success', 'IP Deleted');
    }
	private function getMacsNotBluethood()
	{
		$macs_find = Macs_db::all();
		$macs = array();
		$bluetooth = Icon_db::query()->where('name', '=', 'Bluetooth')->get()[0]->id;
		foreach ($macs_find as $mac) {
			if($mac->icon != $bluetooth){
				$mac->device = Device_db::query()->where('id', '=', $mac->device)->get()[0];
				$mac->icon = Icon_db::query()->where('id', '=', $mac->icon)->get()[0];
				array_push($macs, $mac);
			}
		}
		return $macs;
	}
}
