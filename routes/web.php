<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FireRiskDataController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\BiomasaController;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::resource('users', UserController::class);
Route::resource('fire_risk_data', FireRiskDataController::class);
Route::resource('lugares', LugarController::class);
Route::resource('biomasas', BiomasaController::class);

// Datos (gráficas y métricas)
Route::get('/datos', function () {
    return view('admin.datos');
})->name('datos.index');

// Simulación (maquetación)
Route::get('/simulacion', function () {
    return view('admin.simulacion');
})->name('simulacion.index');
