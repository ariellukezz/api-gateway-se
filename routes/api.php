<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\UbigeoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\Auth\Loginontroller;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\InstitucionOrigenController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\EvaluacionCVController;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
// Passport::routes();

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user', [App\Http\Controllers\Auth\LoginController::class, 'user'])->middleware('auth:api');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->middleware('auth:api');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/check-token', function(Request $request) {
    return response()->json(['estado'=>true],200);
})->middleware('auth:api');

/* Ariel */
Route::middleware('client')->group(function () {
    Route::get('/unidades', [UnidadController::class, 'index']);
    Route::post('/unidad', [UnidadController::class, 'store']);
    Route::get('/unidad/{id}', [UnidadController::class, 'show']);
    Route::put('/unidad/{id}', [UnidadController::class, 'update']);
    Route::delete('/unidad/{id}', [UnidadController::class, 'destroy']);

    Route::get('/programas', [ProgramaController::class, 'index']);     
    Route::post('/programa', [ProgramaController::class, 'store']);
    Route::get('/programa/{id}', [ProgramaController::class, 'show']);
    Route::put('/programa/{id}', [ProgramaController::class, 'update']);
    Route::delete('/programa/{id}', [ProgramaController::class, 'destroy']);
});

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuario', [UsuarioController::class, 'store']);
Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
Route::put('/usuario/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);
/* Ariel */

/* Felix */
Route::post('/sedes', [SedeController::class, 'index']);
Route::get('/sede/{id}', [SedeController::class, 'show']);
Route::post('/sede', [SedeController::class, 'store']);
Route::patch('/sede/{id}', [SedeController::class, 'update']);
Route::delete('/sede/{id}', [SedeController::class, 'destroy']);

Route::post('/convocatorias', [ConvocatoriaController::class, 'index']);
Route::get('/convocatoria/{id}', [ConvocatoriaController::class, 'show']);
Route::post('/convocatoria', [ConvocatoriaController::class, 'store']);
Route::patch('/convocatoria/{id}', [ConvocatoriaController::class, 'update']);
Route::delete('/convocatoria/{id}', [ConvocatoriaController::class, 'destroy']);
Route::get('/buscar_convocatoria_por_nombre/{buscar}', [ConvocatoriaController::class, 'Buscar']);

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

Route::post('/document-types', [TipoDocumentoController::class, 'index']);
Route::post('/document-types/data', [TipoDocumentoController::class, 'store']);
Route::put('/document-types/{id}', [TipoDocumentoController::class, 'update']);
Route::delete('/document-types/{id}', [TipoDocumentoController::class, 'destroy']);

Route::post('/documents', [DocumentoController::class, 'index']);
Route::post('/documents/preinscription', [DocumentoController::class, 'documentsPreinscripcion']);


Route::get('/search-ubigeo/{term}', [UbigeoController::class, 'ubigeoSearch']);
//Route::post('/get-ubigeo', [UbigeoController::class, 'ubigeoSearch']);

Route::get('/get-solicitud/{con}-{pro}-{pos}', [ReporteController::class, 'descargarPDF']);

Route::post('/entrevistastore', [InterviewController::class, 'store']);
Route::patch('/entrevista/{id}', [InterviewController::class, 'update']);
Route::get('/entrevista/{id}', [InterviewController::class, 'show']);
// Route::get('/entrevista', [InterviewController::class, 'index']);
Route::post('/entrevista', [InterviewController::class, 'index']);
Route::delete('/entrevista/{id}', [InterviewController::class, 'destroy']); 
Route::get('/entrevista_puntajes/{id}', [InterviewController::class, 'puntajes']);
Route::post('/entrevista_generar', [InterviewController::class, 'generar']);


Route::post('/get-postulantes-cv', [EvaluacionCVController::class, 'getPostulantes'])->middleware('auth:api','admin');

// Route::post('/login', [LoginController::class, 'login']);
//POST      http://174.138.178.198:8020/api/documents 
//POST      http://174.138.178.198:8020/api/documents/preinscription