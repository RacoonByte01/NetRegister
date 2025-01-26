<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Users_dbController;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\MacsController;
use App\Http\Controllers\IpsController;
use App\Http\Controllers\TypesController;

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
Route::get('/devices', [DevicesController::class, 'index'])->name('devices.view');

// Macs
Route::get('/macs', [MacsController::class, 'index'])->name('macs.view');

// Ips
Route::get('/ips', [IpsController::class, 'index'])->name('ips.view');

// Types
Route::get('/type-mac', [TypesController::class, 'index'])->name('types.view');
