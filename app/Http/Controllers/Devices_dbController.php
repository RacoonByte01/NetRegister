<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\Events\DarkModeWasToggled;
use App\Models\Device_db;
use App\Models\User;
use App\Models\User_db;

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
		$device = Device_db::all();

        return view('devices/index', ['darkmode' => $darkModeWasToggled->darkMode->isEnabled(), 'devices' => $device]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DarkModeWasToggled $darkModeWasToggled)
    {
        //
		$users = User_db::all();
        return view('devices/create', ['darkmode' => $darkModeWasToggled->darkMode->isEnabled(), 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
