<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Macs_db;
use App\Models\Device_db;
use App\Models\Icon_db;
use JeroenNoten\LaravelAdminLte\Events\DarkModeWasToggled;

class Macs_dbController extends Controller
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
		$macs = Macs_db::all();
		foreach ($macs as $mac) {
			$mac->icon = Icon_db::query()->where('id', '=', $mac->icon)->get()[0];
			$mac->device = Device_db::query()->where('id', '=', $mac->device)->get()[0];
		}
		return view('macs/index', [
			'darkmode' => $darkModeWasToggled->darkMode->isEnabled(),
			'macs' 		=> 		$macs,
		]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DarkModeWasToggled $darkModeWasToggled)
    {
        //
		$devices = Device_db::all();
		$icons = Icon_db::query()->where('group', '=', 'mac-type')->get();
		return view('macs/create', [
			'darkmode' 	=> 	$darkModeWasToggled->darkMode->isEnabled(),
			'devices' 	=> 	$devices,
			'icons' 	=> 	$icons
		]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
		$mac = new Macs_db([
			'addres' 	=> 	strtoupper($request->get('addres')),
			'device' 	=> 	$request->get('device'),
			'icon' 		=> 	$request->get('icon'),
		]);
		$mac->save();
		return redirect()->route('mac.index')->with('Success', 'Mac Added');
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
		$mac = Macs_db::find($id);
		$devices = Device_db::all();
		$icons = Icon_db::query()->where('group', '=', 'mac-type')->get();
		return view('macs/edit', [
			'darkmode' 	=> 	$darkModeWasToggled->darkMode->isEnabled(),
			'devices' 	=> 	$devices,
			'icons' 	=> 	$icons,
			'mac' 		=> 	$mac
		]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
		$mac = Macs_db::find($id);
		$mac->addres = $request->get('addres');
		$mac->icon = $request->get('icon');
		$mac->device = $request->get('device');
		$mac->save();
		return redirect()->route('mac.rndex')->with('Success', 'Mac Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
		$mac = Macs_db::find($id);
		$mac->delete();
		return redirect()->route('mac.index')->with('Success', 'Mac Deleted');
    }
}
