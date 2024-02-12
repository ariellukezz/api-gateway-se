<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\SedeController;

Route::get('/unidades', [UnidadController::class, 'index']);
Route::post('/unidad', [UnidadController::class, 'store']);
Route::get('/unidad/{id}', [UnidadController::class, 'show']);
Route::put('/unidad/{id}', [UnidadController::class, 'update']);
Route::delete('/unidad/{id}', [UnidadController::class, 'destroy']);

Route::get('/sedes', [SedeController::class, 'index']);
Route::get('/sede/{id}', [SedeController::class, 'show']);
Route::post('/sede', [SedeController::class, 'store']);
Route::patch('/sede/{id}', [SedeController::class, 'update']);
Route::delete('/sede/{id}', [SedeController::class, 'destroy']);
 