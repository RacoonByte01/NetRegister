<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Users_dbController;
use App\Http\Controllers\Devices_dbController;
use App\Http\Controllers\Macs_dbController;
use App\Http\Controllers\Ips_dbController;

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
Route::get('/macs', [Macs_dbController::class, 'index'])->name('mac.index');
Route::get('/macs/create', [Macs_dbController::class, 'create'])->name('mac.create');
Route::post('/macs/create/insert', [Macs_dbController::class, 'store'])->name('mac.insert');
Route::get('/macs/edit/{id}', [Macs_dbController::class, 'edit'])->name('mac.edit');
Route::post('/macs/edit/update/{id}', [Macs_dbController::class, 'update'])->name('mac.update');
Route::get('/macs/edit/destroy/{id}', [Macs_dbController::class, 'destroy'])->name('mac.destroy');

// Ips
Route::get('/ips', [Ips_dbController::class, 'index'])->name('ip.index');
Route::get('/ips/create', [Ips_dbController::class, 'create'])->name('ip.create');
Route::post('/ips/create/insert', [Ips_dbController::class, 'store'])->name('ip.insert');
Route::get('/ips/edit/{id}', [Ips_dbController::class, 'edit'])->name('ip.edit');
Route::post('/ips/edit/update/{id}', [Ips_dbController::class, 'update'])->name('ip.update');
Route::get('/ips/edit/destroy/{id}', [Ips_dbController::class, 'destroy'])->name('ip.destroy');
