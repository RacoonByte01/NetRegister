<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UsersController;
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
Route::get('/users', [UsersController::class, 'index'])->name('user-view');

// Devices
Route::get('/devices', [DevicesController::class, 'index'])->name('devices-view');

// Macs
Route::get('/macs', [MacsController::class, 'index'])->name('macs-view');

// Ips
Route::get('/ips', [IpsController::class, 'index'])->name('ips-view');

// Types
Route::get('/type-mac', [TypesController::class, 'index'])->name('types-view');
