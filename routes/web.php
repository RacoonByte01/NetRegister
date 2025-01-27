<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Users_dbController;
use App\Http\Controllers\Devices_dbController;
use App\Http\Controllers\MacsController;
use App\Http\Controllers\IpsController;
use App\Http\Controllers\TypesController;
use App\Models\Device_db;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Dashbard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Users
Route::get('/users', [Users_dbController::class, 'index'])->name('user.index');
Route::get('/users/create', [Users_dbController::class, 'create'])->name('user.create');
Route::post('/users/create/insert', [Users_dbController::class, 'store'])->name('user.insert');
Route::get('/users/edit/{id}', [Users_dbController::class, 'edit'])->name('user.edit');
Route::post('/users/edit/update/{id}', [Users_dbController::class, 'update'])->name('user.update');
Route::get('/users/edit/destroy/{id}', [Users_dbController::class, 'destroy'])->name('user.destroy');

// Devices
Route::get('/devices', [Devices_dbController::class, 'index'])->name('device.index');
Route::get('/devices/create', [Devices_dbController::class, 'create'])->name('device.create');
Route::post('/device/create/insert', [Devices_dbController::class, 'store'])->name('device.insert');
Route::get('/device/edit/{id}', [Devices_dbController::class, 'edit'])->name('device.edit');
Route::post('/device/edit/update/{id}', [Devices_dbController::class, 'update'])->name('device.update');
Route::get('/device/edit/destroy/{id}', [Devices_dbController::class, 'destroy'])->name('device.destroy');

// Macs
Route::get('/macs', [MacsController::class, 'index'])->name('macs.view');

// Ips
Route::get('/ips', [IpsController::class, 'index'])->name('ips.view');

// Types
Route::get('/type-mac', [TypesController::class, 'index'])->name('types.view');
