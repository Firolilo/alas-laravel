<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FireRiskDataController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\BiomasaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::resource('fire_risk_data', FireRiskDataController::class);
Route::resource('lugares', LugarController::class);
Route::resource('biomasas', BiomasaController::class);
