<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\Events\DarkModeWasToggled;
use App\Models\User_db;

class Users_dbController extends Controller
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
		// $users = DB::select('select * from users_db');
		// dd(User_db::all());
		// return view('users/index', ['darkmode' => $darkModeWasToggled->darkMode->isEnabled(), 'users' => $users]);
        //
		$users = User_db::all();
		return view('users/index', ['darkmode' => $darkModeWasToggled->darkMode->isEnabled(), 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
		return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		// $this -> validate(
		// 	$request,
		// 	[
		// 		'name' 		=> 		'required',
		// 		'comment' 	=> 		'required'
		// 	]
		// );
		$user = new User_db([
			'name' 		=> 	$request->get('name'),
			'comment' 	=> 	$request->get('comment')
		]);
		$user -> save();
		return redirect()->route('user.index')->with('Success', 'User Added');
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
		$user = User_db::find($id);
		return view('users/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
		$user = User_db::find($id);
		$user->name = $request->name;
		$user->comment = $request->comment;
		$user->save();
		return redirect()->route('user.index')->with('Success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
		$user = User_db::find($id);
		$user->delete();
		return redirect()->route('user.index')->with('Success', 'User Delete');
    }
}
