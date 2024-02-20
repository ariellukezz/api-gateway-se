<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\InstitucionOrigenController;
use App\Http\Controllers\VacanteController;

use Laravel\Passport\Passport;

// Passport::routes();

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

/* Ariel */
Route::middleware('client')->group(function () {
    Route::get('/unidades', [UnidadController::class, 'index']);
    Route::post('/unidad', [UnidadController::class, 'store']);
    Route::get('/unidad/{id}', [UnidadController::class, 'show']);
    Route::put('/unidad/{id}', [UnidadController::class, 'update']);
    Route::delete('/unidad/{id}', [UnidadController::class, 'destroy']);
});


/* Ariel */

Route::get('/programas', [ProgramaController::class, 'index']);     
Route::post('/programa', [ProgramaController::class, 'store']);
Route::get('/programa/{id}', [ProgramaController::class, 'show']);
Route::put('/programa/{id}', [ProgramaController::class, 'update']);
Route::delete('/programa/{id}', [ProgramaController::class, 'destroy']);

/* Felix */
Route::get('/sedes', [SedeController::class, 'index']);
Route::get('/sede/{id}', [SedeController::class, 'show']);
Route::post('/sede', [SedeController::class, 'store']);
Route::patch('/sede/{id}', [SedeController::class, 'update']);
Route::delete('/sede/{id}', [SedeController::class, 'destroy']);

Route::get('/convocatorias', [ConvocatoriaController::class, 'index']);
Route::get('/convocatoria/{id}', [ConvocatoriaController::class, 'show']);
Route::post('/convocatoria', [ConvocatoriaController::class, 'store']);
Route::patch('/convocatoria/{id}', [ConvocatoriaController::class, 'update']);
Route::delete('/convocatoria/{id}', [ConvocatoriaController::class, 'destroy']);

Route::get('/institucionesOrigen', [InstitucionOrigenController::class, 'index']);
Route::get('/institucionOrigen/{id}', [institucionOrigenController::class, 'show']);
Route::post('/institucionOrigen', [InstitucionOrigenController::class, 'store']);
Route::patch('/institucionOrigen/{id}', [institucionOrigenController::class, 'update']);
Route::delete('/institucionOrigen/{id}', [institucionOrigenController::class, 'destroy']);

Route::get('vacantes', [VacanteController::class, 'index']);
Route::post('vacante', [VacanteController::class, 'store']);
Route::get('vacante/{id}', [VacanteController::class, 'show']);
Route::put('vacante/{id}', [VacanteController::class, 'update']);
Route::delete('vacante/{id}', [VacanteController::class, 'destroy']);

// Route::get('/sedes', [SedeController::class, 'index']);
// Route::get('/sede/{id}', [SedeController::class, 'show']);
Route::post('/pago', [PagoController::class, 'store']);
Route::put('/pago/{id}', [PagoController::class, 'update']);
// Route::delete('/sede/{id}', [SedeController::class, 'destroy']);

/* Denis */
Route::get('/postulantes', [PostulanteController::class, 'index']);
Route::post('/postulante', [PostulanteController::class, 'store']);
