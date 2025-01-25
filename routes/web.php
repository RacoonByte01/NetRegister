<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DevicesController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Dashbard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Users
Route::get('/users', [UsersController::class, 'index'])->name('user-view');

// Devices
